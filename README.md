FrameWork perso basique 

PHP architecture MVC
avec javascript (gsap)
style en sass
lien base de données sql

Site responsive

Realtivement vierge et épurer pour en faire ce que vous voulez !

Le but de cet outil est de pouvoir créer un site dynamique
avec une base prenant en charge la gestion des utilisateurs pour les
visiteurs, utilisateurs, administrateurs
avec 
inscription, connexion, gestion profil, suppression compte

L'utilisateur pourra choisir une image de profil personnelle ou 
une image proposée par le site.

L'aministrateur pourra gérer les droits et supprimer un compte.

dans le même dossier que pdo.model.php
créez un fichier 
donnees_perso.model.php 
contenant :


<?php

// A redefinir avec nouvelle base de données pour chaque projet

define("mysql","ip de votre hebergeur" );
define("dbname","nom_bdd" );
define("user","nom_utilisateur_bdd" );
define("mdpbd","code de connexion à la bdd" );



?>

