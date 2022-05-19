<?php
function register($db, $firstname, $lastname, $email, $password, $nickname){
    $check = $db->prepare('SELECT * FROM `user` WHERE `email` = :email OR `nickname` = :nickname');
    $check = getUser($db, $email);
    if($userExist = $check->fetchObject()){
        $msgError = "L'utilisateur est déjà éxistant";
    }
    else{
        $insert = $db->prepare("
            INSERT INTO `user` 
            (`firstname`, `lastname`, `nickname`, `email`, `password`)
            VALUES (:firstname, :lastname, :nickname, :email, :password)
        ");
        $insert->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $insert->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $insert->bindValue(':nickname', $nickname, PDO::PARAM_STR);
        $insert->bindValue(':email', $email, PDO::PARAM_STR);
        $insert->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        // $insert->bindValue(':img', $img, PDO::PARAM_STR);
        $result = $insert->execute();
    
        return $result;
    }
}

function login($db, $email, $password){
    $check = getUser($db, $email);
    $resultUserExist = $check->fetchObject();

    if (!$resultUserExist) {
        return false;
    }else {
        $msgSuccess = "vous êtes connecté";
        $msgError = "le mot de passe ou l'email de connexion est incorrecte";

        return $result = array(
            'data' => $resultUserExist,
            'msg' => password_verify($password, $resultUserExist->password) ? $msgSuccess : $msgError
        );
    }       
}

function getUser($db, $email){
     
    $user = $db->prepare('SELECT * FROM `user` WHERE `email` = :email');
    $user -> bindValue(':email', $email, PDO::PARAM_STR);
    
    $user->execute();
    return $user;
}

function setEmail($db,){

}

function setPassword($db,){

}

function setNickname($db, $email, $nickname){
    $updateNickname = $db->prepare('UPDATE `user` SET `nickname` = :nickname WHERE `email` = :email');
    $updateNickname->bindValue(':nickname', $nickname, PDO::PARAM_STR);
    $updateNickname->bindValue(':email', $email, PDO::PARAM_STR);
    $updateNickname->execute();
}

function setImg($db,){

}

function removeUser($db,){

}




