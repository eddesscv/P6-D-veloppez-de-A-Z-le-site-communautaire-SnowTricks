<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Entity\Comment;
use App\Form\TrickType;
use App\Form\CommentType;
use App\Service\Cropper16x9;
use App\Service\UploadImage;
use App\Service\ThumbnailResizer;
use App\Repository\TrickRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class SnowtricksController extends AbstractController
{
    /**
     * @Route("/snowtricks", name="snowtricks")
     */
    public function index(TrickRepository $repo): Response
    {

        $tricks = $repo->findAll();

        return $this->render('snowtricks/index.html.twig', [
            'controller_name' => 'SnowtricksController',
            'tricks' => $tricks
        ]);
    }

    /**
     *
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('snowtricks/home.html.twig', [
            'title' => "Bienvenue sur SnowTricks !",
            'age' => 31
        ]);
    }

    /**
     *
     * @Route("/snowtricks/new", name="snowtricks_create")
     * @Route("/snowtricks/{id}/edit", name="snowtricks_edit") 
     */
    /*  public function form(Trick $trick = null, Request $request, EntityManagerInterface $manager) //"Doctrine\Persistence\ObjectManager" but no such service exists.
    {
        if (!$trick) {
            $trick = new Trick();
        }

        $form = $this->createForm(TrickType::class, $trick);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$trick->getId()) {
                $trick->setCreatedAt(new \DateTime());
            }
            $manager->persist($trick);
            $manager->flush();

            $this->addFlash('success', 'La figure a bien été créée');
            return $this->redirectToRoute('snowtricks_show', ['id' => $trick->getId()]);
        }

        return $this->render('snowtricks/create.html.twig', [
            'formTrick' => $form->createView(),
            'editMode' => $trick->getId() !== null
        ]);
    } */

    public function create(Trick $trick = null, Request $request, EntityManagerInterface $manager, Cropper16x9 $cropper16x9, UploadImage $uploadImage, ThumbnailResizer $thumbnailResizer)
    {
        $trick = new Trick();

        $form = $this->createForm(TrickType::class, $trick);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mainImage = $trick->getMainImage();
            // Assignation du trick à l'image principale
            $mainImage->setTrick($trick);
            // Enregistrement de l'image sur le disque dur et en BDD
            $mainImage = $uploadImage->saveImage($mainImage);
            // On persiste l'entité Image une fois bien remplie dans la BDD
            $manager->persist($mainImage);

            // Enregistrement sur le disque de l'image redimensionnée en 16x9
            $cropper16x9->crop($mainImage);
            // Enregistrement sur le disque de l'image redimensionnée à la taille d'un thumbnail
            $thumbnailResizer->resize($mainImage);

            foreach ($trick->getImages() as $image) {
                // Assignation du trick à l'image
                $image->setTrick($trick);
                // Enregistrement de l'image sur le disque dur et en BDD
                $image = $uploadImage->saveImage($image);
                // On persiste l'entité Image une fois bien remplie dans la BDD
                $manager->persist($image);

                // Enregistrement sur le disque de l'image redimensionnée en 16x9
                $cropper16x9->crop($image);
                // Enregistrement sur le disque de l'image redimensionnée à la taille d'un thumbnail (!!! A partir de l'image 16x9 !!!)
                $thumbnailResizer->resize($image);
            }

            foreach ($trick->getVideos() as $video) {
                $video->setTrick($trick);
                $manager->persist($video);
            }

            $trick->setCreatedAt(new \DateTime());
            $trick->setUpdatedAt(new \DateTime());
            $trick->setUser($this->getUser());

            $manager->persist($trick);
            $manager->flush();

            $this->addFlash(
                'success',
                'Le trick <strong>' . $trick->getTitle() . '</strong> a bien été enregistré !'
            );

            return $this->redirectToRoute('snowtricks_show', ['id' => $trick->getId()]);
        }

        return $this->render('snowtricks/create.html.twig', [
            'formTrick' => $form->createView()
        ]);
    }

    /**
     *
     * @Route ("/snowtricks/{id}", name="snowtricks_show")
     */
    public function show(Trick $trick, Request $request, EntityManagerInterface $manager)
    {

        $comment = new Comment;

        $form = $this->createForm(CommentType::class, $comment);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new \DateTime());
            $comment->setTrick($trick);
            $comment->setUser($this->getUser());

            $manager->persist($comment);
            $manager->flush();

            $this->addFlash(
                'success',
                'Votre commentaire a bien été enregistré !'
            );

            return $this->redirectToRoute('snowtricks_show', ['id' => $trick->getId()]);
        }

        return $this->render('snowtricks/show.html.twig', [
            'trick' => $trick,
            'commentForm' => $form->createView()
        ]);
    }


    /**
     * @Route("/snowtricks/{id}/edit", name="snowtricks_edit")
     */
    public function edit(Request $request, TrickRepository $repo, EntityManagerInterface $manager, $id)
    {
        $trick = $repo->findOneById($id);

        $form = $this->createForm(TrickType::class, $trick);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($trick->getImages() as $image) {
                $image->setTrick($trick);
                $manager->persist($image);
            }

            $trick->setUpdatedAt(new \DateTime());

            $manager->persist($trick);
            $manager->flush();

            $this->addFlash(
                'success',
                'Le trick <strong>' . $trick->getTitle() . '</strong> a bien été modifié !'
            );

            return $this->redirectToRoute('snowtricks_show', ['id' => $trick->getId()]);
        }

        return $this->render('snowtricks/edit.html.twig', [
            'form' => $form->createView(),
            'trick' => $trick
        ]);
    }
}
