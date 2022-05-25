<div class="modal" id="modalRemoveUser" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Voulez vous supprimez votre compte ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="removeUserHandler.php" method="POST">
        <div class="modal-body d-flex justify-content-center">
            <button type="submit" class=" deleteYes btn btn-success me-3" data-bs-dismiss="modal">oui</button>
            <button type="button" class=" deleteNo btn btn-danger ms-3" data-bs-dismiss="modal">non</button>
        </div>
      </form>

    </div>
  </div>
</div>