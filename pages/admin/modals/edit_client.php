<style>
    h5 {
        text-align: center;
    }
</style>

<form action="../../config/client/edit.php" method="post">
    <!-- The Edit Client Modal -->
    <div class="modal fade" id="edit_client<?= $client['client_id'] ?>" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Client Account Information</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row row-col-2 mb-3 mt-3">
                        <div class="col input-group ">
                            <span class="input-group-text fw-bold">Username</span>
                            <input type="text" value="<?= $client['username'] ?>" class="form-control form-control"
                                placeholder="Enter Username" name="username" required />
                        </div>
                        <div class="col input-group ">
                            <span class="input-group-text fw-bold">Password</span>
                            <input type="password" value="<?= $client['password'] ?>" placeholder="Enter Password"
                                class="form-control form-control" name="password" required />
                        </div>
                    </div>

                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Name</span>
                        <input type="text" placeholder="Enter Firstname" class="form-control form-control"
                            name="firstname" value="<?= $client['firstname'] ?>" required />
                        <input type="text" placeholder="Enter Middlename" class="form-control form-control"
                            name="middlename" value="<?= $client['middlename'] ?>" required />
                        <input type="text" placeholder="Enter Lastname" class="form-control form-control"
                            name="lastname" value="<?= $client['lastname'] ?>" required />
                    </div>

                    <div class="row row-col-2 mb-3 mt-3">
                        <div class="col input-group">
                            <span class="input-group-text fw-bold">Gender</span>
                            <select name="gender" class="form-select" required>
                                <option selected disabled>Select Gender</option>
                                <option value="male" <?= ($client['gender'] == "male") ? "selected" : "" ?>>Male</option>
                                <option value="female" <?= ($client['gender'] == "female") ? "selected" : "" ?>>Female
                                </option>
                                <option value="other" <?= ($client['gender'] == "other") ? "selected" : "" ?>>Other</option>
                            </select>
                        </div>
                        <div class="col input-group">
                            <span class="input-group-text fw-bold">Age</span>
                            <input type="number" placeholder="Enter age" min=0 class="form-control form-control"
                                name="age" value="<?= $client['age'] ?>" required />
                        </div>
                    </div>

                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Address</span>
                        <input type="text" placeholder="Enter Barangay" class="form-control form-control"
                            name="barangay" required value="<?= $client['brgy'] ?>" />
                        <input type="text" placeholder="Enter Municipality" class="form-control form-control"
                            name="municipality" value="<?= $client['municipality'] ?>" required />
                        <input type="text" placeholder="Enter Province" class="form-control form-control"
                            name="province" required value="<?= $client['province'] ?>" />
                    </div>

                    <div class="row row-col-3 mb-3 mt-3">
                        <div class="col input-group">
                            <span class="input-group-text fw-bold">Birthdate</span>
                            <input type="date" class="form-control form-control" name="bdate"
                                value="<?= $client['birthdate'] ?>" required />
                        </div>
                        <div class="col input-group">
                            <span class="input-group-text fw-bold">Phone Number</span>
                            <input type="phone" placeholder="Enter phone number" maxlength="11"
                                class="form-control form-control" name="phone_num" value="<?= $client['phone_num'] ?>"
                                required />
                        </div>
                        <div class="col input-group">
                            <span class="input-group-text fw-bold">Zip code</span>
                            <input type="text" placeholder="Enter zip code" class="form-control form-control"
                                name="zip_code" value="<?= $client['zip_code'] ?>" required />
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="hidden" name="client_id" value="<?= $client['client_id'] ?>">
                    <button type="submit" class="btn btn-success" name="edit">Confirm</button>
                </div>

            </div>
        </div>
    </div>
</form>