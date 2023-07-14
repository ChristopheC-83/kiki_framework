<?php


require_once("./models/pdo.model.php");


function getPasswordUser($login)
{
    $req = "SELECT password FROM user_management WHERE login = :login";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultat['password'];
    
}

function isCombinaisonValide($login, $password)
{
    $passwordBd = getPasswordUser($login);
    return password_verify($password, $passwordBd);
}

function getMailUser($login)
{
    $req = "SELECT mail FROM user_management WHERE login = :login";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultat['mail'];
}
function getImgSiteUser($login)
{
    $req = "SELECT img_site FROM user_management WHERE login = :login";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultat['img_site'];
}



// function compteActif($login)
// {
//     $req = "SELECT est_valide FROM user_management WHERE login = :login";
//     $stmt = getBDD()->prepare($req);
//     $stmt->bindValue(":login", $login, PDO::PARAM_STR);
//     $stmt->execute();
//     $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
//     $stmt->closeCursor();
//     return ((int)$resultat['est_valide'] === 1);
// }

function getUserInformation($login)
{
    $req = "SELECT * FROM user_management WHERE login = :login";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultat;
}

function verifLoginDispo($login)
{
    $utilisateur = getUserInformation($login);
    return empty($utilisateur);
}

function bdCreerCompte($login, $passwordCrypte, $mail, $cle, $image,$img_site,  $role)
{
    $req = "INSERT INTO user_management (login, password, mail, role, cle, image, img_site)
            VALUES(:login, :password, :mail, :role, :cle, :image, :img_site)";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":password", $passwordCrypte, PDO::PARAM_STR);
    $stmt->bindValue(":mail", $mail, PDO::PARAM_STR);
    $stmt->bindValue(":cle", $cle, PDO::PARAM_INT);
    $stmt->bindValue(":image", $image, PDO::PARAM_STR);
    $stmt->bindValue(":img_site", $img_site, PDO::PARAM_INT);
    $stmt->bindValue(":role", $role, PDO::PARAM_STR);
    $stmt->execute();
    $creationOK = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $creationOK;
}

// function bdValidationMailCompte($login, $cle)
// {
//     $req = "UPDATE user_management set est_valide = 1 
//             WHERE login = :login
//             and cle = :cle
//             ";
//     $stmt = getBDD()->prepare($req);
//     $stmt->bindValue(":login", $login, PDO::PARAM_STR);
//     $stmt->bindValue(":cle", $cle, PDO::PARAM_INT);
//     $stmt->execute();
//     $validationOk = ($stmt->rowCount() > 0);
//     $stmt->closeCursor();
//     return $validationOk;
// }

function bdModifMailUser($login, $mail)
{
    $req = "UPDATE user_management set mail = :mail 
            WHERE login = :login
            ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":mail", $mail, PDO::PARAM_STR);
    $stmt->execute();
    $validationOk = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $validationOk;
}
function bdModifMDP($login, $password)
{
    $req = "UPDATE user_management set password = :password 
            WHERE login = :login
            ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":password", $password, PDO::PARAM_STR);
    $stmt->execute();
    $validationOk = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $validationOk;
}


function bdSuppCompte($login)
{
    $req = "DELETE FROM user_management 
            WHERE login = :login
            ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->execute();
    $suppressionOk = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $suppressionOk;
}
