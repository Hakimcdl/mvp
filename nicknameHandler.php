<?php

require __DIR__ . '/config/config.php';
require __DIR__ . '/functions/database.fn.php';
require __DIR__ . '/functions/user.fn.php';

$db = getPdoLink($config);
if (empty(session_id())) {
    session_start();
}
//var_dump($_SESSION);
$email = $_SESSION['email'];
// executer getuser;
$userstatement = getUser($db, $email);
$userVerif = $userstatement->fetchObject();
$nickname = htmlentities(trim($_POST['nickname']),ENT_QUOTES);
// compare $email avec $userVerif->email;
//Si cest bon
// je donne une valeur a $nickname;
// je vérifie si par exple le user a rentré + de 3 caractères;
// si c/est bon j/execute setnickname;
if($email == $userVerif->email){
    if (strlen($nickname) > 3) {
        setNickname($db, $email, $nickname);
    }else {
        $msgError = 'Le nouveau pseudonyme est trop court';
    }
}

$lastUrl =  $_SERVER['HTTP_REFERER'];
if ($msgError){
    header("Location: $lastUrl?error=$msgError");
}else{
    $_SESSION['nickname'] = $_POST['nickname'];
    header("Location: $lastUrl");
}

