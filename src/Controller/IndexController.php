<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class IndexController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function HomeAction()
    {
        return $this->render("home.html.twig", [], null);
    }



}