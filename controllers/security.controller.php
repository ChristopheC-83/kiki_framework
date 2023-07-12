<?php

function secureHTML($chaine)
{
    return htmlentities($chaine);
}

function estConnecte()
{
    return (!empty($_SESSION['profil']));
}
function estUtilisateur()
{
    return (!empty($_SESSION['profil']['role'] === "utilisateur"));
}
function estAdministrateur()
{
    return (!empty($_SESSION['profil']['role'] === "administrateur"));
}

define("COOKIE_NAME", "timer");

function genererCookieConnexion(){
    $ticket  = session_id().microtime().rand(0,999999);
    $ticket = hash("sha512", $ticket);
    //le cookie expire dans timeExp secondes
    $timeExp = 60*20;
    setcookie(COOKIE_NAME, $ticket, time()+$timeExp);
    $_SESSION['profil'][COOKIE_NAME] = $ticket;
}

function checkCookieConnexion(){
    return $_COOKIE[COOKIE_NAME] === $_SESSION['profil'][COOKIE_NAME];
}

function generateRandomPassword($length = 20) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*_-=+;:,.?";
    $password = substr(str_shuffle($chars), 0, $length);
    return $password;
}