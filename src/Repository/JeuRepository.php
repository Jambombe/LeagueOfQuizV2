<?php

namespace App\Repository;

use App\Entity\Jeu;

class JeuRepository
{
    private $objConnect;

    public function __construct()
    {
        $connexion = new ConnexionDb();
        $this->objConnect = $connexion->getDb();

        $jeu = new Jeu();
        var_dump($jeu);
    }

    public function getGames(){

        $query = "SELECT * FROM games";
        $res = $this->objConnect->query($query);
        $jeux = $res->fetchAll(/*\PDO::FETCH_CLASS, 'Jeu'*/);

        return $jeux;
    }
}