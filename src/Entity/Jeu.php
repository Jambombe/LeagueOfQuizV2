<?php

namespace App\Entity;


class Jeu {
    private $id;
    private $name;
    private $image;

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function getImage() { return $this->image; }
    public function setImage($image) { $this->image = $image; }

}