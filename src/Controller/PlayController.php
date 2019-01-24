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
        var_dump($jeuRepo->getGames());
        return $this->render("play.html.twig", []);
    }



}