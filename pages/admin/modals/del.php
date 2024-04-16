<!-- The Delete User Modal -->
<div class="modal fade" id="delete_user<?= $row['account_id'] ?>">
    <div class="modal-dialog modal-dialog-center">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <h5>Are you sure you want to delete this user?</h5>
                <h6><?= $row['username'] ?></h6>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <form action="../../config/employee/del.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['account_id'] ?>">
                    <button type="submit" name="delete" class="btn btn-success">Confirm</button>
                </form>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>