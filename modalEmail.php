<div class="modal" id="modalEmail" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Changer votre courriel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="emailHandler.php" method="POST">
        <div class="modal-body">
            <label for="inputEmail">Adresse email :</label>
            <input type="email" name="email" placeholder="Nouveau courriel">
            <label for="inputPassword">Mot de passe :</label>
            <input type="password" name="password">
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>

    </div>
  </div>
</div>