<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\TrickRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */
    public function index(CategoryRepository $repo): Response
    {

        $categories = $repo->findAll();

        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/category/new", name="category_create")
     * @Route("/category/{id}/edit", name="category_edit")
     * @IsGranted("ROLE_USER")
     */
    public function categoryForm(Category $category = null, Request $request, EntityManagerInterface $manager)
    {

        if (!$category) {
            $category = new Category();
        }

        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($category);
            $manager->flush();

            $this->addFlash(
                'success',
                'La catégorie <strong>' . $category->getTitle() . '</strong> a bien été créé !'
            );

            return $this->redirectToRoute('trick_create');
        }

        return $this->render('category/create.html.twig', [
            'formCategory' => $form->createView(),
            'editMode' => $category->getId() !== null
        ]);
    }

    /**
     * @Route("/category/{id}", name="category_show")
     */
    public function show(Category $category) //@ParamConverter
    {
        return $this->render('category/show.html.twig', [
            'category' => $category
        ]);
    }
}
