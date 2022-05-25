<?php

require __DIR__ . '/config/config.php';
require __DIR__ . '/functions/database.fn.php';
require __DIR__ . '/functions/user.fn.php';

$db = getPdoLink($config);
if (empty(session_id())) {
    session_start();
}

$id = $_SESSION['id'];

$email = htmlentities(trim($_POST['email']),ENT_QUOTES);
$userstatement = getUser($db, $_SESSION['email']);
$userVerif = $userstatement->fetchObject();
$password = $_POST['password'];
//$hash = password_hash("azerty", PASSWORD_BCRYPT);
//$hash = $userVerif->password;
echo $hash;
echo $_POST['password'] . '<pre>' . $userVerif->password;
if(password_verify ($_POST['password'], $userVerif->password)){
    echo 'ok';
}else{
    echo 'ko';
}
//password_verify ("azerty", $hash)
//if(password_verify ($_POST['password'], $userVerif->password)){
//if(password_verify ($password, $hash)){
    if($userVerif->id == $id && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email'] = $_POST['email'];
        setEmail($db, $email, $id);
        $msgSuccess = 'Le courriel a été modifié';
    }else{
        $msgError = "le courriel est invalide";
    }
//}else{
//    $msgError = "le mdp est érroné";
//}

$lastUrl =  $_SERVER['HTTP_REFERER'];
if ($msgError){
    header("Location: $lastUrl?error=$msgError");
}else{
    session_unset();
    session_destroy();

    header("Location: index.php");
}