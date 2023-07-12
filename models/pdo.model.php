<?php

// fichier de connexion à bdd
require_once ("./models/donnees_perso.model.php");

function setBDD()
{
    try {
        //connexion à notre BDD, à modifier pour site en construction
        $pdo = new PDO(
            "mysql:host=".mysql.";dbname=".dbname, user, mdpbd,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    return $pdo;
}

function getBDD()
{
    $pdo = setBDD();
    if ($pdo === null) {
        setBDD();
    }
    return $pdo;
}
