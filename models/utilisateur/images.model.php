<?php


require_once("./models/pdo.model.php");

function bdAjoutImage($login, $image, $img_site)
{
    $req = "UPDATE user_management set image = :image, img_site = :img_site
                WHERE login = :login
                ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":image", $image, PDO::PARAM_STR);
    $stmt->bindValue(":img_site", $img_site, PDO::PARAM_INT);
    $stmt->execute();
    $validationOk = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $validationOk;
}


function getImageUser($login)
{
    $req = "SELECT image FROM user_management WHERE login = :login";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultat['image'];
}

function modifImageBD($login, $image, $img_site)
{
    $req = "UPDATE user_management set image = :image, img_site = :img_site
                WHERE login = :login
                ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":image", $image, PDO::PARAM_STR);
    $stmt->bindValue(":img_site", $img_site, PDO::PARAM_INT);
    $stmt->execute();
    $validationOk = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $validationOk;
}
