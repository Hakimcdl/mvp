<?php

require __DIR__ . '/config/config.php';
require __DIR__ . '/functions/database.fn.php';
require __DIR__ . '/functions/user.fn.php';

$db = getPdoLink($config);

if (empty(session_id())) {
    session_start();
}

$email = filter_var(htmlentities(trim($_POST['email']),FILTER_VALIDATE_EMAIL));
$password = $_POST['password'];

if (in_array("", $_POST)) {
    $msgError= "tout les champs sont obligatoires";
}else{
    $email = htmlentities(trim($_POST['email']));
    $password = htmlentities(trim($_POST['password']));
    $results = login($db, $email, $password);
    $result = $results['data'];
    $msg = $results['msg'];
}

$urlResult = $_SERVER['HTTP_REFERER'];
if ($msgError){
    header("Location: $urlResult?error=$msgError");
}elseif (!$results || $msg ==  $msgError) {
    $msg = "le mot de passe ou l'email de connexion est incorrecte";
    header("Location: $urlResult?error=$msg");
}else{
    $_SESSION['id'] = $result->id;
    $_SESSION['firstname'] = $result->firstname;
    $_SESSION['lastname'] = $result->lastname;
    $_SESSION['nickname'] = $result->nickname;
    $_SESSION['email'] = $result->email;
    header("Location: index.php?success=$msg");
}
    