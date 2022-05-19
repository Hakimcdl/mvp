<?php
include 'utilities/header.php';
require __DIR__ . '/functions/user.fn.php';

$email = $_SESSION['email'];
$userstatement = getUser($db, $email);
$profile = $userstatement->fetchObject();
?>

<section class="container">
    <div class="account card my-3" style="">
        <img src="assets/img/nuagepourpre.jpg" class="card-img-top" style="height: 195px" alt="imagebackground">
        
        <div class="imgProfil">
            <p><i class="fa-solid fa-pen" data-bs-toggle="modal" data-bs-target="#modalimg"></i></p>
            <img src="<?= $profile->img ?>" alt="avatar">
        </div>

        <div class="card-body">
            <h2><?= $profile->firstname ?> <?= $profile->lastname ?></h2>
            <h3><?= $profile->nickname ?><i class="fa-solid fa-pen" data-bs-toggle="modal" data-bs-target="#modalNickname"></i></h3>
            <p class="card-text"><?= $profile->email ?></p>
        </div>
    </div>
    <?php 
        include 'modalimg.php';
        include 'modalNickname.php'; 
    ?>
</section>

<?php
include 'utilities/footer.php';
?>

