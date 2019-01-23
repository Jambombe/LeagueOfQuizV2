<?php

namespace App\Entity;


class Reponse {

    private $ennonce;
    private $isCorrect;

    public function getEnnonce() { return $this->ennonce; }
    public function setEnnonce($ennonce) { $this->ennonce = $ennonce; }
    public function isCorrect() { return $this->isCorrect; }
    public function setIsCorrect($isCorrect) { $this->isCorrect = $isCorrect; }

}