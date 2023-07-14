<?php

//define ("constante_globale", "valeur")
// permet de générer une variable globale => constante_globale (sans les "")
define("image_init", "profils/profil_init.jpg");


require_once("./models/utilisateur/images.model.php");
function validation_modifImage($file)
{

    try {
        $repertoire = "public/assets/images/profils/" . $_SESSION['profil']['login'] . "/";
        $nomImage = ajoutImage($file, $repertoire);
        suppressionImageUtilisateur($_SESSION['profil']['login']);
        $nomImageBd = "profils/" . $_SESSION['profil']['login'] . "/" . $nomImage;
        if (bdAjoutImage($_SESSION['profil']['login'], $nomImageBd, 0)) {
            // ajouterMessageAlerte("Modfication de l'image effectuée.", "vert");
            header('location:' . URL . "compte/profil");
        } else {
            ajouterMessageAlerte("Modfication de l'image non effectuée.", "rouge");
            header('location:' . URL . "compte/profil");
        }
    } catch (Exception $e) {
        ajouterMessageAlerte($e->getMessage(), "rouge");
        header('location:' . URL . "compte/profil");
    }
}

function ajoutImage($file, $repertoire)
{

    if (!isset($file['name']) || empty($file['name'])) {
        throw new Exception("Vous devez sélectionner une image.");
    }

    if (!file_exists($repertoire)) mkdir($repertoire, 0777);

    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $random = rand(0, 999999);
    $target_file = $repertoire . $random . "_" . $file['name'];

    if (!getimagesize($file["tmp_name"]))
        throw new Exception("Le fichier n'est pas une image");
    if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
        throw new Exception("L'extension du fichier n'est pas reconnu");
    if (file_exists($target_file))
        throw new Exception("Le fichier existe déjà.");
    if ($file['size'] > 500000)
        throw new Exception("Le fichier est trop volumineux (500ko maximum).");
    if (!move_uploaded_file($file['tmp_name'], $target_file))
        throw new Exception("l'ajout de l'image n'a pas fonctionné");
    else return ($random . "_" . $file['name']);
}

function suppressionImageUtilisateur($login)
{
    if (!getImgSiteUser($login)) {
        $ancienne_image = getImageUser($login);
        unlink("public/assets/images/" . $ancienne_image);
    }
}

function validation_ChangerAvatar($img)
{
    suppressionImageUtilisateur($_SESSION['profil']['login']);
    $image = "profils/profils_site/" . $img;
    if (modifImageBD($_SESSION['profil']['login'], $image, 1)) {
        // ajouterMessageAlerte("Modfication de l'image effectuée.", "vert");

        header('location:' . URL . "compte/profil");
    } else {
        ajouterMessageAlerte("Modfication de l'image non effectuée.", "rouge");
        header('location:' . URL . "compte/profil");
    }
}
