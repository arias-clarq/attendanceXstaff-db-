<form action="../../config/employee/edit.php" method="post">
    <!-- The Edit User Modal -->
    <div class="modal fade" id="edit_acc<?= $row['account_id'] ?>">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Account</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="mb-3 mt-3">
                        <label class="form-label fw-bold">Username:</label>
                        <input class="form-control" value="<?= $row['username'] ?>" placeholder="Enter username"
                            type="text" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Password:</label>
                        <input class="form-control" value="<?= $row['password'] ?>" placeholder="Enter password"
                            type="text" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Select Role:</label>
                        <select name="login_role" class="form-select">
                            <option value="1" <?= ($row['login_role'] == 1) ? "selected" : "" ?>>Admin</option>
                            <option value="2" <?= ($row['login_role'] == 2) ? "selected" : "" ?>>Employee</option>
                        </select>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#edit_acc_info<?= $row['account_id'] ?>">
                        Next
                    </button>
                </div>

            </div>
        </div>
    </div>
    <?php include 'edit_account_info.php'; ?>
</form>