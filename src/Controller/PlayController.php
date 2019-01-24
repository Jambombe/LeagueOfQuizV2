<?php

namespace App\Controller;


use App\Repository\JeuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class PlayController extends Controller
{
    /**
     * @Route("/jouer", name="play")
     */
    public function PlayAction()
    {
        $jeuRepo = new JeuRepository();
        $games = $jeuRepo->getGamesTmp();
        return $this->render("play.html.twig", ['games' => $games]);
    }



}