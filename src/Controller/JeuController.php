<?php

namespace App\Controller;


use App\Entity\Jeu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class JeuController extends Controller
{
    /**
     * @Route("/jouer", name="play")
     */
    public function PlayAction()
    {
        $jeuRepo = $this->getDoctrine()->getRepository(Jeu::class);
        $games = $jeuRepo->findAll();
        return $this->render("gameList.html.twig", ['games' => $games]);
    }



}