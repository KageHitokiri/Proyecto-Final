<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerCharacterController extends AbstractController
{
    /**
     * @Route("/player/upload/{data}", name="player_character")
     */
    public function index($data): Response
    {
        return $this->render('player_character/index.html.twig', [
            'controller_name' => 'PlayerCharacterController',
        ]);
    }
}
