<?php

require dirname(__DIR__) . '/config/config.php';
require dirname(__DIR__) . '/functions/database.fn.php';

$db = getPdoLink($config);

if (empty(session_id())) {
    session_start();
}

$domain = 'http://localhost/phpinternship/';
$index_page = $domain;
$index_name = 'Ma Vapote Préférée';
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Php Internship</title>
</head>
<body>
    <header>
        <div class="d-flex justify-content-between pt-3">
            <a class="ms-3 my-auto" href="/"><img src="assets/img/logomvp.jpg" alt="logo"></a>
            <h1 class="my-auto text-light"><?php echo $title; ?></h1>
            <div class="row me-3">
                <?php if(!isset($_SESSION['id'])): ?>
                    <button type="button" class=" signIn btn btn-warning mb-3 mx-auto text-light">Sign in</button>
                    <button type="button" class="btn btn-info mb-3 mx-auto"><a class="nav-link text-light py-0" href="registerForm.php">Sign up</a></button>
                <?php elseif(isset($_SESSION['id'])): ?>
                  <div class="d-flex align-items-center">
                    <a class="nav-link text-light btn btn-danger" href="logout.php">Log out</a>
                  </div>
                <?php endif; ?>
            </div>
        </div>
        <nav class= "bg-primary mt-3 py-2 d-flex justify-content-around">
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
            <?php 
            if (!isset($_SESSION['id'])){
              echo '<div class="login">';
              include 'login.php'; 
              echo '</div>';
            }else{
              echo '<a href="account.php"><img src="assets/img/img_avatar1.png" alt="avatar"></a>';
            }
              ?>

        </nav>
        
    </header>

    <?php
        if(isset($_GET["error"])){
            echo "<div class='bg-danger'>
                <p class='p-3 mb-2 text-white fw-bold text-align-center'>{$_GET["error"]}</p>
            </div>";
        }
      ?>