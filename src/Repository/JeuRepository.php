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
    }

    public function getGames(){

        $query = "SELECT * FROM games";
        $res = $this->objConnect->query($query);
        $jeux = $res->fetchAll(/*\PDO::FETCH_CLASS, 'Jeu'*/);

        return $jeux;
    }

    public function getGamesTmp() {
        return $jeux = [
            new Jeu(1, 'League of Legends', 'https://www.journaldugeek.com/content/uploads/2018/11/lol.jpg'),
            new Jeu(2, 'Rainbow Six : Siege', 'https://www.francetvinfo.fr/image/75ixjwddg-cb66/1200/450/15537079.jpg'),
            new Jeu(3, 'Zelda : Breath of the Wild', 'http://lvdneng.rosselcdn.net/sites/default/files/dpistyles_v2/ena_16_9_extra_big/2017/03/20/node_135469/26978859/public/2017/03/20/B9711469332Z.1_20170320163347_000%2BGSQ8N0IE2.1-0.jpg?itok=sqSbfbjZ'),
            new Jeu(4, 'Mario Odyssey', 'https://cdn03.nintendo-europe.com/media/images/06_screenshots/games_5/nintendo_switch_6/nswitch_supermarioodyssey/NSwitch_SuperMarioOdyssey_10.jpg'),
        ];
    }
}