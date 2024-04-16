<!-- The Edit User Modal -->
<div class="modal fade" id="edit_user<?= $row['account_id'] ?>">
    <div class="modal-dialog modal-dialog-center">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit <?= $row['username'] ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
               <!-- content here -->
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" name="edit" class="btn btn-success">Confirm</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>