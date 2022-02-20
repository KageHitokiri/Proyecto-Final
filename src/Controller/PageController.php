<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('page/index.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    /**
     * @Route("/play", name="play")
     */
    public function launchGame(): Response {
        return $this->render('page/play.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    /**
     * @Route("/wiki", name="wiki")
     */
    public function readWiki(): Response {
        return $this->render('page/wiki.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(): Response {
        return $this->render('page/about.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    /**
     * @Route("/ToS", name="ToS")
     */
    public function termsOfService(): Response {
        return $this->render('page/tos.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    /**
     * @Route("/privacy", name="privacy")
     */
    public function privacy(): Response {
        return $this->render('page/privacy.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }
}