<?php

namespace App\Controller;

use App\Repository\TrickRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", defaults={"_fragment" = "portfolio"})
     */
    public function home(TrickRepository $repo): Response
    {
        // Get 10 tricks from position 0
        $tricks = $repo->findBy([], ['createdAt' => 'DESC'], 10, 0);

        return $this->render('trick/home.html.twig', [
            'controller_name' => 'TrickController',
            'tricks' => $tricks,
            'title' => "Bienvenue sur SnowTricks !"
        ]);
    }

    /**
     * Get the 1O next tricks in the database and create a Twig file with them that will be displayed via Javascript
     * 
     * @Route("/{start}", name="loadMoreTricks", requirements={"start": "\d+"})
     */
    public function loadMoreTricks(TrickRepository $repo, $start = 10)
    {
        // Get 10 tricks from the start position
        $tricks = $repo->findBy([], ['createdAt' => 'DESC'], 10, $start);

        return $this->render('trick/loadMoreTricks.html.twig', [
            'tricks' => $tricks
        ]);
    }
}
