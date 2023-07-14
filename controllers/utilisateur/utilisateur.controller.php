<?php


require_once("./controllers/functionController.controller.php");
require_once("./models/visiteur/visiteur.model.php");
require_once("./models/utilisateur/utilisateur.model.php");
require_once("./controllers/functionController.controller.php");
require_once("./controllers/images.controller.php");

function validation_login($login, $password)
{
    if (isCombinaisonValide($login, $password)) {

        // ajouterMessageAlerte("Hello " . $login . " ! You're welcome !", "vert");
        $_SESSION['profil'] = [
            "login" => $login,
        ];
        genererCookieConnexion();
        header('location:' . URL . "compte/profil");
    } else {
        ajouterMessageAlerte("Combinaison Login / Mot de passe non valide.", "rouge");
        header('location:' . URL . "login");
    }
}

function profil()
{
    $datas = getUserInformation($_SESSION['profil']['login']);
    $_SESSION['profil']['role'] = $datas['role'];

    $data_page = [
        "page_description" => "Description Utilisateur",
        "page_title" => "Votre profil",
        "view" => "views/pages/utilisateur/profil.view.php",
        "template" => "views/commons/template.php",
        "utilisateur" => $datas,
    ];
    genererPage($data_page);
}

function deconnexion()
{
    session_unset();
    setcookie(COOKIE_NAME, "", time() - 3600);
    header('location:' . URL . "accueil");
    // ajouterMessageAlerte("Vous êtes bien déconnecté.", "vert");
}

function validation_creerCompte($login, $password, $mail)
{
    if (verifLoginDispo($login)) {
        $passwordCrypte = password_hash($password, PASSWORD_DEFAULT);
        $cle = rand(0, 999999);
        $img_site = 1; // car on mettra une image du site par défaut en avatar
        if (bdCreerCompte($login, $passwordCrypte, $mail, $cle, "profils/profils_site/profil_init.jpg", $img_site,  "utilisateur")) {
            // sendMailValidation($login, $mail, $cle);
            // ajouterMessageAlerte("Votre compte a été créer. <br> Merci de la valider via le lien envoyé sur votre adresse mail.", "vert");
            header('location:' . URL . "accueil");
        } else {
            ajouterMessageAlerte("Echec de la création de votre compte.<br> Merci de recommencer.", "rouge");
            header('location:' . URL . "creerCompte");
        }
    } else {
        ajouterMessageAlerte("Ce nom est déja utilisé.<br> Merci d'en choisir un autre", "rouge");
        header('location:' . URL . "creerCompte");
    }
}

// function sendMailValidation($login, $mail, $cle)
// {
//     $urlDeVerification = URL . "validationMail/" . $login . "/" . $cle;
//     $sujet = "Création du compte";
//     $message = "Pour valider votre compte, merci de cliquer sur le lien suivant : <br>" . $urlDeVerification;
//     sendMail($mail, $sujet, $message);
// }

// function renvoyerMailValidation($login)
// {
//     $utilisateur = getUserInformation($login);
//     sendMailValidation($login, $utilisateur['mail'], $utilisateur['cle']);
//     header('location:' . URL . "login");
// }


function validation_modificationMail($mail)
{
    if (bdModifMailUser($_SESSION['profil']['login'], $mail)) {
        // ajouterMessageAlerte("Le mail est modifié.", "vert");
    } else {
        ajouterMessageAlerte("Aucune modification effectuée.", "rouge");
    }
    header('location:' . URL . "compte/profil");
}

function validation_modificationMDP($oldPassword, $newPassword, $verifNewPassword)
{
    if ($newPassword === $verifNewPassword) {
        if (isCombinaisonValide($_SESSION['profil']['login'], $oldPassword)) {
            $mdpCrypte = password_hash($newPassword, PASSWORD_DEFAULT);
            if (bdModifMDP($_SESSION['profil']['login'], $mdpCrypte)) {
                // ajouterMessageAlerte("Mot de passe modifié !", "vert");
                header('location:' . URL . "compte/profil");
            } else {
                ajouterMessageAlerte("La modification a échoué.", "rouge");
                header('location:' . URL . "compte/profil");
            }
        } else {
            ajouterMessageAlerte("La combinaison nom / ancien mot de passe n'est pas valide.", "rouge");
            header('location:' . URL . "compte/profil");
        }
    } else {
        ajouterMessageAlerte("Merci de bien vérifier votre nouveau mot de passe.", "rouge");
        header('location:' . URL . "compte/profil");
    }
}

function validation_suppressionCompte()
{
    suppressionImageUtilisateur($_SESSION['profil']['login']);
    rmdir("public/assets/images/profils/" . $_SESSION['profil']['login']);

    if (bdSuppCompte($_SESSION['profil']['login'])) {
        deconnexion();
        // ajouterMessageAlerte("Suppression du compte effectuée.", "vert");
        header('location:' . URL . "accueil");
    } else {
        ajouterMessageAlerte("La suppression du compte a échoué.<br>Contacter l'administrateur.", "rouge");
        header('location:' . URL . "compte/profil");
    }
}

function validation_mdpOublie($login, $mail)
{
    if (!isCombinaisonMailOublieValide($login, $mail)) {
        ajouterMessageAlerte("Merci de vérifier", "rouge");
    } else {
        $newMdp = generateRandomPassword(20);
        bdChangementMdpOublie($login, $newMdp);
        $destinataire = $mail;
        $sujet = "on a oublié son mdp ?";
        $message = "on va résoudre ça ! \r\nEssaye avec : \r\n \r\n" . $newMdp . " \r\n \r\nChange le sur le site... lui tu ne risques pas de le retenir !";
        ajouterMessageAlerte("Un nouveau mdp envoyé par mail", "vert");
        sendMail($destinataire, $sujet, $message,);
    }
    header('location:' . URL . "mdpOublie");
}

function isCombinaisonMailOublieValide($login, $mail)
{
    $maildBd = getMailUser($login);
    if ($maildBd === $mail) {
        // ajouterMessageAlerte("Bon mail", "vert");
        return true;
    } else {
        ajouterMessageAlerte("mauvais mail", "rouge");
        return false;
    }
}

function bdChangementMdpOublie($login, $newMdp)
{
    $mdpCrypte = password_hash($newMdp, PASSWORD_DEFAULT);
    if (bdModifMDP($login, $mdpCrypte)) {
        // ajouterMessageAlerte("Mot de passe provisoire actif", "vert");
    } else {
        ajouterMessageAlerte("Echec de la mise en place du nouveau mot de passe", "rouge");
    }
}
