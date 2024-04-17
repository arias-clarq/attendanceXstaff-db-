<!-- The Edit User Modal -->
<div class="modal fade" id="edit_acc_info<?= $row['account_id'] ?>" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Account Information</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <hr>
                <div class="mb-3 mt-3">
                    <div class="input-group">
                        <span class="input-group-text fw-bold">Name</span>
                        <input type="text" class="form-control" value="<?= $row['lastname'] ?>" placeholder="Last Name"
                            name="lname">
                        <input type="text" class="form-control" value="<?= $row['firstname'] ?>"
                            placeholder="First Name" name="fname">
                        <input type="text" class="form-control" value="<?= $row['middlename'] ?>"
                            placeholder="Middle Name" name="mname">
                    </div>

                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Email</span>
                        <input class="form-control" placeholder="Enter Email" value="<?= $row['email'] ?>" type="email"
                            name="email" />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Phone no.</span>
                        <input class="form-control" maxlength="11" placeholder="Enter Phone Number" type="phone"
                            name="phone" value="<?= $row['phone_num'] ?>">
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Age</span>
                        <input class="form-control" value="<?= $row['age'] ?>" min="0" placeholder="Enter Age"
                            type="number" name="age">
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text fw-bold">Birthday</span>
                    <input class="form-control" value="<?= $row['birthdate'] ?>" type="date" name="bday">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text fw-bold">Gender</span>
                    <select name="gender" class="form-select">
                        <option selected disabled>Select Gender</option>
                        <option value="male" <?= ($row['gender'] == "male") ? "selected" : "" ?>>Male</option>
                        <option value="female" <?= ($row['gender'] == "female") ? "selected" : "" ?>>Female</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text fw-bold">Marital Status</span>
                    <select name="marital_status" class="form-select">
                        <option selected disabled>Select Option</option>
                        <option value="single" <?= ($row['marital_status'] == "single") ? "selected" : "" ?>>Single
                        </option>
                        <option value="married" <?= ($row['marital_status'] == "married") ? "selected" : "" ?>>Married
                        </option>
                        <option value="divorced" <?= ($row['marital_status'] == "divorced") ? "selected" : "" ?>>
                            Divorced
                        </option>
                        <option value="widowed" <?= ($row['marital_status'] == "widowed") ? "selected" : "" ?>>Widowed
                        </option>
                        <option value="separated" <?= ($row['marital_status'] == "separated") ? "selected" : "" ?>>
                            Separated</option>
                        <option value="civil_union" <?= ($row['marital_status'] == "civil_union") ? "selected" : "" ?>>
                            Civil Union</option>
                        <option value="in_a_relationship" <?= ($row['marital_status'] == "in_a_relationship") ? "selected" : "" ?>>In a Relationship</option>
                        <option value="its_complicated" <?= ($row['marital_status'] == "its_complicated") ? "selected" : "" ?>>It's Complicated</option>
                    </select>
                </div>

                <!-- location -->
                <div class="row row-col-2 mb-3">
                    <div class="col">
                        <label class="form-label fw-bold">Province:</label>
                        <input class="form-control" value="<?= $row['province'] ?>" type="text" name="province">
                    </div>

                    <div class="col ">
                        <label class="form-label fw-bold">Zip:</label>
                        <div class="col d-flex align-items-center justify-content-center">
                            <div class="input-group" style="height: 1.4rem;">
                                <span class="input-group-text fw-bold">Zip</span>
                                <input class="form-control" value="<?= $row['zip'] ?>" placeholder="Enter zip code"
                                    type="text" name="zip" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <div class="input-group">
                        <span class="input-group-text fw-bold">School</span>
                        <input type="text" value="<?= $row['elem'] ?>" class="form-control"
                            placeholder="Enter Elementary" name="elem">
                        <input type="text" value="<?= $row['jhs'] ?>" class="form-control"
                            placeholder="Enter Junior Highschool" name="jhs">
                        <input type="text" value="<?= $row['shs'] ?>" class="form-control"
                            placeholder="Enter Senior Highschool" name="shs">
                        <input type="text" value="<?= $row['college'] ?>" class="form-control"
                            placeholder="Enter College" name="college">
                    </div>
                </div>

                <hr>
                <?php
                $id = $row['account_id'];
                $sql2 = "SELECT * FROM `tbl_employement` WHERE `job_id` = $id";
                $res2 = $conn->query($sql2);
                while ($row2 = $res2->fetch_assoc()) {
                    ?>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Job Title</span>
                        <input type="text" value="<?= $row2['job_title'] ?>" class="form-control"
                            placeholder="Enter Job Title" name="job_title">
                    </div>

                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Employement Number</span>
                        <input type="text" value="<?= $row2['employement_num'] ?>" class="form-control"
                            placeholder="Enter employement number" name="employement_num">
                    </div>

                    <div class=" input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Department Number</span>
                        <input type="text" value="<?= $row2['department_number'] ?>" class="form-control"
                            placeholder="Enter department number" name="department_num">
                    </div>

                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Hire Date</span>
                        <input type="date" value="<?= $row2['hire_date'] ?>" class="form-control" name="hire_date">
                    </div>

                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Employee Status</span>
                        <input type="text" value="<?= $row2['employee_status'] ?>" class="form-control"
                            placeholder="Enter Employee Status" name="employee_status">
                    </div>

                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Job Value</span>
                        <input type="number" value="<?= $row2['job_value'] ?>" class="form-control"
                            placeholder="Enter job value" name="job_value">
                    </div>

                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Department value</span>
                        <input type="number" value="<?= $row2['dep_value'] ?>" class="form-control"
                            placeholder="Enter Department value" name="dep_value">
                    </div>

                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Statistic Value</span>
                        <input type="number" value="<?= $row2['stat_value'] ?>" class="form-control"
                            placeholder="Enter Statistic Value" name="stat_value">
                    </div>

                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Salary</span>
                        <input type="number" value="<?= $row2['salary'] ?>" class="form-control" placeholder="Enter Salary"
                            name="salary">
                    </div>

                    <?php
                }
                ?>

                <hr>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#edit_acc<?= $row['account_id'] ?>">
                    Back
                </button>
                <input type="hidden" name="id" value="<?= $row['account_id'] ?>">
                <button type="submit" class="btn btn-success" name="edit">Confirm</button>
            </div>

        </div>
    </div>
</div>