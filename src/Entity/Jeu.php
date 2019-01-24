<?php

namespace App\Entity;


class Jeu {
    private $id;
    private $name;
    private $image;
    private $urlToPlay;

    public function __construct($id, $name, $image/*, $urlToPlay*/)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setImage($image);
//        $this->setUrlToPlay($urlToPlay);
    }

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function getImage() { return $this->image; }
    public function setImage($image) { $this->image = $image; }
    public function getUrlToPlay() { return $this->urlToPlay; }
    public function setUrlToPlay($urlToPlay) { $this->urlToPlay = $urlToPlay; }

}