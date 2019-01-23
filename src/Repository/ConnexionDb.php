<?php

namespace App\Repository;

class ConnexionDb{

    private $db;

    const HOST = 'localhost';
    const DB_NAME = "league_of_quizz";
    const USER = 'root';
    const PASSWORD = '';

    function __construct() {
        try {
            $this->setDb(new \PDO('mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME, self::USER, self::PASSWORD));
        } catch (Exception $e)
        {
            die ("Une erreur est survenue lors de la connexion à la base de donnée &rarr; " . $e->getMessage());
        }
    }

    function closeConnexion()
    {
        $this->setDb(NULL);
    }

    public function getDb() { return $this->db; }
    public function setDb($db) { $this->db = $db; }
}