<h1>FrameWork perso base site dynamique </h1>

PHP architecture MVC<br>
avec javascript (gsap)<br>
style en sass<br>
lien base de données sql<br>
<br>
Site responsive<br>
<br>
Relativement vierge et épurer pour en faire ce que vous voulez !<br><br>

Le but de cet outil est de pouvoir créer un site dynamique<br><br>
avec une base prenant en charge la gestion des utilisateurs pour les<br>
visiteurs, utilisateurs, administrateurs<br><br>
avec <br>
inscription, connexion, gestion profil, suppression compte.<br><br>

L'utilisateur pourra choisir une image de profil personnelle<br><br> ou <br><br>
une image proposée par le site.<br><br>

L'aministrateur pourra gérer les droits et supprimer un compte.<br><br>

dans le même dossier que pdo.model.php<br>
créez un fichier <br>
donnees_perso.model.php <br>
contenant :<br><br>



// A redefinir avec nouvelle base de données pour chaque projet<br><br>

define("mysql","ip de votre hebergeur" );<br>
define("dbname","nom_bdd" );<br>
define("user","nom_utilisateur_bdd" );<br>
define("mdpbd","code de connexion à la bdd" );<br><br>



