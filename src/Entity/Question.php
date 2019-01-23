<?php

namespace App\Entity;


class Question {
    private $id;
    private $ennonce;
    private $urlImage;
    private $reponses; // Array contenant toutes les reponses proposées pour la question

    function getId() { return $this->id; }
    function getEnnonce() { return $this->ennonce; }
    function getUrlImage() { return $this->urlImage; }
    function getReponses() { return $this->reponses; }
}