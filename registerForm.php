<?php
require __DIR__ . '/utilities/header.php';
?>

<section class="container">
    <div class="row">
        <form class="card col-10 mx-auto" action="registerFormHandler.php" method= "POST">
            <div class="d-flex col-8 mx-auto">   
                <input class="form-control mb-3 m-3 text-center" type="text" name="firstname" placeholder="prénom">
                <input class="form-control mb-3 m-3 text-center" type="test" name="lastname" placeholder="nom">
            </div> 
            <div class="d-flex col-8 mx-auto">
                <input class="form-control mb-3 m-3 text-center" type="text" name="nickname" placeholder="pseudonyme">
                <input class="form-control mb-3 m-3 text-center" type="email" name="email" placeholder="courriel">
            </div>
            <div class="col-4 mx-auto">
                <label class="form-label text-center">Entrez votre mot de passe :</label>
                <input class="form-control mb-3 col-8 text-center" type="password" name="password">
                <input type="file" name="image">
            </div>

            <button class="btn btn-primary mb-3 col-2 m-3 mx-auto"type="submit">Envoyer</button>
            <?php
            if(isset($_GET["error"])){
                echo "<div class='bg-danger'>
                    <p class='p-3 mb-2 text-white fw-bold text-align-center'>{$_GET["error"]}</p>
                </div>";
            }
            ?>
        </form>
    </div>
</section>

<?php
require __DIR__ . '/utilities/footer.php';
?>