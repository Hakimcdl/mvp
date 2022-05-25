<?php

require __DIR__ . '/config/config.php';
require __DIR__ . '/functions/database.fn.php';
require __DIR__ . '/functions/user.fn.php';

$db = getPdoLink($config);
if (empty(session_id())) {
    session_start();
}
$email = $_SESSION['email'];

$userstatement = getUser($db, $email);
$userVerif = $userstatement->fetchObject();
$firstname = htmlentities(trim($_POST['firstname']), ENT_QUOTES);
$lastname = htmlentities(trim($_POST['lastname']), ENT_QUOTES);

if($email == $userVerif->email){
    if(strlen($firstname) >= 3 && strlen($lastname) >= 3) {
        setFirstnameLastname($db, $email, $firstname, $lastname);
    }else {
        $msgError = 'erreur de modification du prénom et du nom';
    }
}

$lastUrl =  $_SERVER['HTTP_REFERER'];
if ($msgError){
    header("Location: $lastUrl?error=$msgError");
}else{
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    header("Location: $lastUrl");
}