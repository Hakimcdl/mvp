<?php
include 'utilities/header.php';
require __DIR__ . '/functions/user.fn.php';

session_start();
$email = $_SESSION['email'];
$userstatement = getUser($db, $email);
$profile = $userstatement->fetchObject();
echo $profile->email;
echo '<pre>';
echo $_SESSION['email'];
var_dump ($_SESSION);
?>

<section class="container">
    <div class="account card my-3" style="">
        <img src="assets/img/nuagepourpre.jpg" class="card-img-top" style="height: 195px" alt="imagebackground">

        <div class="d-flex flex-column justify-content-center mx-auto text-center align-items-center">
            <div class="imgProfil">
                <p><i class="fa-solid fa-pen" data-bs-toggle="modal" data-bs-target="#modalimg"></i></p>
                <img src="<?= $profile->img ?>" alt="avatar">
            </div>

            <div class="card-body">
                <h2><?= $profile->firstname ?> <?= $profile->lastname ?><i class="fa-solid fa-pen" data-bs-toggle="modal" data-bs-target="#modalFirstnameLastname"></i></h2>
                <h3><?= $profile->nickname?><i class="fa-solid fa-pen" data-bs-toggle="modal" data-bs-target="#modalNickname"></i></h3>
                <p class="card-text"><?= $profile->email ?><i class="fa-solid fa-pen" data-bs-toggle="modal" data-bs-target="#modalEmail"></i></p>
                <span class="nav-link text-light btn btn-danger col-12" data-bs-toggle="modal" data-bs-target="#modalRemoveUser">Supprimer profile</span>
            </div>
        </div>

    </div>

    <?php 
        include 'modalimg.php';
        include 'modalNickname.php'; 
        include 'modalEmail.php';
        include 'modalFirstnameLastname.php';
        include 'modalRemoveUser.php';
    ?>
</section>

<?php
include 'utilities/footer.php';
?>

