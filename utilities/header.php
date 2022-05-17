<?php

require dirname(__DIR__) . '/config/config.php';
require dirname(__DIR__) . '/functions/database.fn.php';

$db = getPdoLink($config);

if (empty(session_id())) {
    session_start();
}

$domain = 'http://localhost/phpinternship/';
$index_page = $domain;
$index_name = 'Accueil';
$about_page = $domain . 'about.php';
$about_name = 'A propos';
$contact_page = $domain . 'contact.php';
$contact_name = 'Nous contacter';
$account_page = $domain . 'account.php';
$account_name = 'Mon compte';
$shop_page = $domain . 'shop.php';
$shop_name = 'Ma boutique';
$register_page = $domain . 'registerForm.php';
$register_name = 'Mon formulaire d\'enregistrement';
$current_url = $_SERVER['SCRIPT_NAME'];

// Génération du titre en fonction de l'URL sur laquelle l'utilisateur est positionné
if (strpos($index_page, $current_url) !== FALSE || strpos($index_page . 'index.php', $current_url) !== FALSE):
    $title = $index_name;
  elseif (strpos($about_page, $current_url) !== FALSE):
    $title = $about_name;
  elseif (strpos($contact_page, $current_url) !== FALSE):
    $title = $contact_name;
  elseif (strpos($account_page, $current_url) !== FALSE):
    $title = $account_name;
  elseif (strpos($shop_page, $current_url) !== FALSE):
    $title = $shop_name;
  elseif (strpos($register_page, $current_url) !== FALSE):
    $title = $register_name;
  endif; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="stylesheet" href="assets/library/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/b0c1d04d83.js" crossorigin="anonymous"></script>
    <title>Php Internship</title>
</head>
<body>
    <header>
        <h1><?php echo $title; ?></h1>
        <nav class= "bg-primary py-2">
            <ul class="nav justify-content-center">
                <li class="nav-item"><a class="nav-link text-light 
                <?php if (strpos($index_page, $current_url) !== FALSE || strpos($index_page . 'index.php', $current_url) !== FALSE) echo 'disabled bg-success';?>
                " href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link text-light 
                <?php if (strpos($about_page, $current_url) !== FALSE) echo 'disabled bg-success'; ?>
                " href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link text-light 
                <?php if (strpos($contact_page, $current_url) !== FALSE) echo 'disabled bg-success'; ?>
                " href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link text-light 
                <?php if (strpos($account_page, $current_url) !== FALSE) echo 'disabled bg-success'; ?>
                " href="account.php">Account</a></li>
                <li class="nav-item"><a class="nav-link text-light 
                <?php if (strpos($shop_page, $current_url) !== FALSE) echo 'disabled bg-success'; ?>
                " href="shop.php">Shop</a></li>
            </ul>
        </nav>

        <section class="container">
            <div class="row">
                <?php if(!isset($_SESSION['id'])): ?>
                    <button type="button" class="btn btn-warning m-3 mb-3 col-2 mx-auto"><a class="nav-link text-light" href="">Sign in</a></button>
                    <button type="button" class="btn btn-info m-3 mb-3 col-2 mx-auto"><a class="nav-link text-light" href="registerForm.php">Sign up</a></button>
                <?php elseif(isset($_SESSION['id'])): ?>
                    <button type="button" class="btn btn-danger"><a class="nav-link text-light" href="">Log out</a></button>
                <?php endif; ?>
            </div>
        </section>
    </header>