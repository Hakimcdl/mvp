
    <form class="mx-auto" action="loginHandler.php" method= "POST">
        <div class="d-flex justify-content-between">
            <div class="col-4">
                <input class="form-control text-center" type="email" name="email" placeholder="adresse email">
            </div>
            <div class="col-4">
                <input class="form-control text-center" type="password" name="password" placeholder="mot de passe">
            </div>
            <div class="col-auto">
            <button class="btn btn-success text-center" type="submit">Envoyer</button>
            </div>
        </div>

        <?php
        if(isset($_GET["error"])){
            echo "<div class='bg-danger'>
                <p class='p-3 mb-2 text-white fw-bold text-align-center'>{$_GET["error"]}</p>
            </div>";
        }
        ?>
    </form>