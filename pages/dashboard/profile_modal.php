<div class="modal fade" id="profile">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Profile Account</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="mb-3 mt-3">
                    <label class="form-label fw-bold">Username:</label>
                    <input class="form-control" value="<?= $profile['username'] ?>" placeholder="Enter username"
                        type="text" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Password:</label>
                    <input class="form-control" value="<?= $profile['password'] ?>" placeholder="Enter password"
                        type="text" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Role:</label>
                    <input class="form-control" value="<?= ($profile['login_role'] == 1) ? "Admin" : "Employee" ?>"
                        placeholder="Enter password" type="text" readonly>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#profile_info">
                    Information
                </button>
            </div>

        </div>
    </div>
</div>

<?php include "profile_info_modal.php"; ?>