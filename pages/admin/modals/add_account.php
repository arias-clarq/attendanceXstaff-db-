<form action="../../config/employee/add.php" method="post">
    <!-- The add User Modal -->
    <div class="modal fade" id="add_acc" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">New Account</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="mb-3 mt-3">
                        <label class="form-label fw-bold">Username:</label>
                        <input class="form-control" placeholder="Enter username" type="text" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Password:</label>
                        <input class="form-control" placeholder="Enter password" type="text" name="password" required>
                    </div>
                    <div class="mb-3">
                    <label class="form-label fw-bold">Select Role:</label>
                    <select name="login_role" class="form-select">
                        <option value="1">Admin</option>
                        <option value="2">Employee</option>
                    </select>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_acc_info">
                        Next
                    </button>
                </div>

            </div>
        </div>
    </div>

    <?php include 'add_account_info.php'; ?>
</form>