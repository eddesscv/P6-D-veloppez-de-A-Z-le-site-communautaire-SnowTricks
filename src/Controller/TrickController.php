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
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TrickController extends AbstractController
{
    /**
     *
     * @Route("/trick/new", name="trick_create")
     * @Route("/trick/edit/{slug}", name="trick_edit")
     * @IsGranted("ROLE_USER") 
     */
    public function form(Trick $trick = null, Request $request, EntityManagerInterface $manager, Cropper16x9 $cropper16x9, UploadImage $uploadImage, ThumbnailResizer $thumbnailResizer) //"Doctrine\Persistence\ObjectManager" but no such service exists.
    {
        if (!$trick) {
            $trick = new Trick();
        }

        $form = $this->createForm(TrickType::class, $trick);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$trick->getSlug()) {
                $trick->setCreatedAt(new \DateTime());
            }
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

            return $this->redirectToRoute('home', ['_fragment' => 'portfolio']);
        }

        return $this->render('trick/create.html.twig', [
            'form' => $form->createView(),
            'editMode' => $trick->getSlug() !== null
        ]);
    }



    /**
     * @Route("/trick/show/{slug}", name="trick_show")
     */
    public function show(TrickRepository $repo, Request $request, EntityManagerInterface $manager, $slug)
    {
        $trick = $repo->findOneBySlug($slug);

        $comment = new Comment();

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

            return $this->redirectToRoute('trick_show', ['slug' => $trick->getSlug()]);
        }
        return $this->render('trick/show.html.twig', [
            'trick' => $trick,
            'form' => $form->createView()
        ]);
    }

    /**
     * Get the 10 next comments in the database and create a Twig file with them that will be displayed via Javascript
     * 
     * @Route("/trick/{slug}/{start}", name="loadMoreComments", requirements={"start": "\d+"})
     */
    public function loadMoreComments(TrickRepository $repo, $slug, $start = 10)
    {
        $trick = $repo->findOneBySlug($slug);

        return $this->render('trick/loadMoreComments.html.twig', [
            'trick' => $trick,
            'start' => $start
        ]);
    }



    /**
     * @Route("/trick/delete/{slug}", name="trick_delete")
     * @IsGranted("ROLE_USER")
     */
    public function delete(TrickRepository $repo, EntityManagerInterface $manager, $slug)
    {
        $trick = $repo->findOneBySlug($slug);

        $fileSystem = new Filesystem();

        foreach ($trick->getImages() as $image) {
            $fileSystem->remove($image->getPath() . '/' . $image->getTitle());
            $fileSystem->remove($image->getPath() . '/cropped/' . $image->getTitle());
            $fileSystem->remove($image->getPath() . '/thumbnail/' . $image->getTitle());
        }

        $manager->remove($trick);
        $manager->flush();

        $this->addflash(
            'success',
            "Le trick <strong>{$trick->getTitle()}</strong> a été supprimé avec succès !"
        );

        return $this->redirectToRoute('home');
    }
}
