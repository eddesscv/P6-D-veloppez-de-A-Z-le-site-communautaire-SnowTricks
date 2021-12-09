<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Trick;
use App\Form\CommentType;
use App\Form\TrickType;
use App\Repository\TrickRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    public function form(Trick $trick = null, Request $request, EntityManagerInterface $manager) //"Doctrine\Persistence\ObjectManager" but no such service exists.
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

            return $this->redirectToRoute('snowtricks_show', ['id' => $trick->getId()]);
        }

        return $this->render('snowtricks/create.html.twig', [
            'formTrick' => $form->createView(),
            'editMode' => $trick->getId() !== null
        ]);
    }

    /**
     *
     * @Route ("/snowtricks/{id}", name="snowtricks_show")
     */
    public function show(Trick $trick, Request $request, ObjectManager $manager)
    {

        $comment = new Comment;

        $form = $this->createForm(CommentType::class, $comment);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new \DateTime())
                ->setTrick($trick);

            $manager->persist($comment);
            $manager->flush();

            return $this->redirectToRoute('snowtricks_show', ['id' => $trick->getId()]);
        }

        return $this->render('snowtricks/show.html.twig', [
            'trick' => $trick,
            'commentForm' => $form->createView()
        ]);
    }
}
