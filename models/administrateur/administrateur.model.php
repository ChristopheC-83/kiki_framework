<?php


require_once("./models/pdo.model.php");

function getAllUsersInformation()
{
    $req = "SELECT * FROM user_management";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultat;
}

// function bdModificationRoleUser($login, $role)
// {
//     $req = "UPDATE user_management set role = :role 
//     WHERE login = :login
//     ";
//     $stmt = getBDD()->prepare($req);
//     $stmt->bindValue(":login", $login, PDO::PARAM_STR);
//     $stmt->bindValue(":role", $role, PDO::PARAM_STR);
//     $stmt->execute();
//     $validationOk = ($stmt->rowCount() > 0);
//     $stmt->closeCursor();
//     return $validationOk;
// }
// function bdModificationValidationUser($login, $est_valide)
// {
//     $req = "UPDATE user_management set est_valide = :est_valide 
//     WHERE login = :login
//     ";
//     $stmt = getBDD()->prepare($req);
//     $stmt->bindValue(":login", $login, PDO::PARAM_STR);
//     $stmt->bindValue(":est_valide", $est_valide, PDO::PARAM_BOOL);
//     $stmt->execute();
//     $validationOk = ($stmt->rowCount() > 0);
//     $stmt->closeCursor();
//     return $validationOk;
// }
