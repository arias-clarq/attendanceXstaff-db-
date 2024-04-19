<!-- The Delete User Modal -->
<div class="modal fade" id="delete_client<?= $client['client_id'] ?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-center">
                <h5>Are you sure you want to delete this client?</h5>
                <h6><?= $client['username'] ?></h6>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <form action="../../config/client/del.php" method="post">
                    <input type="hidden" name="id" value="<?= $client['client_id'] ?>">
                    <button type="submit" name="delete" class="btn btn-success">Confirm</button>
                </form>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>