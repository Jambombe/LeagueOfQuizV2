<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class RulesController extends Controller
{
    /**
     * @Route("/regles", name="rules")
     */
    public function RulesAction()
    {
        return $this->render("pages/rules.html.twig", []);
    }



}