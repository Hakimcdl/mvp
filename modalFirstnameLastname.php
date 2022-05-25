<div class="modal" id="modalFirstnameLastname" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Changer votre prénom et nom</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="firstnameLastnameHandler.php" method="POST">
        <div class="modal-body">
            <input type="text" name="firstname" placeholder="Nouveau prénom">
            <input type="text" name="lastname" placeholder="Nouveau nom">
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>

    </div>
  </div>
</div>