<?php

require __DIR__ . '/config/config.php';
require __DIR__ . '/functions/database.fn.php';
require __DIR__ . '/functions/user.fn.php';

$db = getPdoLink($config);

if (empty(session_id())) {
    session_start();
}

$userForm = array(
    $firstname = htmlentities(trim($_POST['firstname']),ENT_QUOTES),
    $lastname = htmlentities(trim($_POST['lastname']),ENT_QUOTES),
    $nickname = htmlentities(trim($_POST['nickname']),ENT_QUOTES),
    $email = filter_var(htmlentities(trim($_POST['email']),FILTER_VALIDATE_EMAIL)),
    $password = $_POST['password']
    // $image = 'assets/img/img_avatar.png'
);

if (in_array("", $userForm)) {
    $msgError = "Tout les champs sont obligatoires";
}else{
    if(!$email){
        $msgError = "l'adresse email n'est pas valide";
    }elseif(strlen($password) < 8){
        $msgError = "le mot de passe doit contenir au moins 8 caractères";
    }else{
        $result = register($db, $firstname, $lastname, $email, $password, $nickname);
        if($result){
            $msgSuccess = "le compte a bien été créé";
        }else{
            $msgError = "une erreur s'est produite";
        }
    }
}

$lastUrl =  $_SERVER['HTTP_REFERER'];
if ($msgError){
    header("Location: $lastUrl?error=$msgError");
}else{
    $_SESSION['id'] = $db->lastInsertId();
    $_SESSION['firstname'] = $db->lastInsertId();
    $_SESSION['lastname'] = $db->lastInsertId();
    $_SESSION['nickname'] = $db->lastInsertId();
    $_SESSION['email'] = $db->lastInsertId();
    $_SESSION['img'] = $db->lastInsertId();
    login($db, $email, $password);
    header("Location: index.php?success=$msgSuccess");
}