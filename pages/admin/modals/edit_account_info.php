<style>
    h5 {
        text-align: center;
    }
</style>
<!-- The Edit User Modal -->
<div class="modal fade" id="edit_acc_info<?= $row['account_id'] ?>" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Account Information</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <h5>Employee Personal Information</h5>
                <hr>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Name</span>
                    <input type="text" class="form-control" value="<?= $row['lastname'] ?>" placeholder="Last Name"
                        name="lname">
                    <input type="text" class="form-control" value="<?= $row['firstname'] ?>" placeholder="First Name"
                        name="fname">
                    <input type="text" class="form-control" value="<?= $row['middlename'] ?>" placeholder="Middle Name"
                        name="mname">
                </div>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Age</span>
                    <input class="form-control" value="<?= $row['age'] ?>" min="0" placeholder="Enter Age" type="number"
                        name="age">
                </div>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Birthday</span>
                    <input class="form-control" value="<?= $row['birthdate'] ?>" type="date" name="bday">
                </div>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Gender</span>
                    <select name="gender" class="form-select">
                        <option selected disabled>Select Gender</option>
                        <option value="male" <?= ($row['gender'] == "male") ? "selected" : "" ?>>Male</option>
                        <option value="female" <?= ($row['gender'] == "female") ? "selected" : "" ?>>Female</option>
                    </select>
                </div>

                <div class="input-group mb-3 mt-3">
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

                <hr>
                <h5>Contact Information</h5>
                <hr>

                <div class="mb-3 mt-3">
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
                </div>

                <hr>
                <h5>Address Details</h5>
                <hr>

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

                <hr>
                <h5>Educational Background</h5>
                <hr>

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
                <h5>Employment Details</h5>
                <hr>

                <div class="row row-col-5 mb-3 mt-3">

                    <div class="col">
                        <label class="form-label fw-bold">Select Job:</label>
                        <select class="form-control" name="job_title">
                            <option selected disabled>Select a job title</option>
                            <option value="Chief Operating Officer" <?= ($row['job_title'] == "Chief Operating Officer") ? "selected" : "" ?>>Chief Operating Officer</option>
                            <option value="Chief Executive" <?= ($row['job_title'] == "Chief Executive") ? "selected" : "" ?>>Chief Executive</option>
                            <option value="Chief Financial Officer" <?= ($row['job_title'] == "Chief Financial Officer") ? "selected" : "" ?>>Chief Financial Officer</option>
                            <option value="Human Resources Manager" <?= ($row['job_title'] == "Human Resources Manager") ? "selected" : "" ?>>Human Resources Manager</option>
                            <option value="Chief Marketing Officer" <?= ($row['job_title'] == "Chief Marketing Officer") ? "selected" : "" ?>>Chief Marketing Officer</option>
                            <option value="Manager" <?= ($row['job_title'] == "Manager") ? "selected" : "" ?>>Manager
                            </option>
                            <option value="Finance Manager" <?= ($row['job_title'] == "Finance Manager") ? "selected" : "" ?>>Finance Manager</option>
                            <option value="Assistant" <?= ($row['job_title'] == "Assistant") ? "selected" : "" ?>>Assistant
                            </option>
                            <option value="Staff" <?= ($row['job_title'] == "Staff") ? "selected" : "" ?>>Staff</option>
                            <option value="Other" <?= ($row['job_title'] == "Other") ? "selected" : "" ?>>Other</option>
                        </select>
                    </div>


                    <div class="col">
                        <label class="form-label fw-bold">Select Department:</label>
                        <select class="form-control" name="department">
                            <option selected disabled>Select department</option>
                            <option value="HR" <?= ($row['department'] == "HR") ? "selected" : "" ?>>HR</option>
                            <option value="Finance" <?= ($row['department'] == "Finance") ? "selected" : "" ?>>Finance
                            </option>
                            <option value="Production" <?= ($row['department'] == "Production") ? "selected" : "" ?>>
                                Production</option>
                            <option value="Accounting" <?= ($row['department'] == "Accounting") ? "selected" : "" ?>>
                                Accounting</option>
                            <option value="Quality department" <?= ($row['department'] == "Quality department") ? "selected" : "" ?>>Quality department</option>
                        </select>
                    </div>

                    <div class="col">
                        <label class="form-label fw-bold">Employment Status:</label>
                        <select class="form-control" name="employee_status">
                            <option selected disabled>Select status</option>
                            <option value="Full-Time Employees" <?= ($row['employee_status'] == "Full-Time Employees") ? "selected" : "" ?>>Full-Time Employees</option>
                            <option value="Part-Time Employees" <?= ($row['employee_status'] == "Part-Time Employees") ? "selected" : "" ?>>Part-Time Employees</option>
                            <option value="Seasonal Employees" <?= ($row['employee_status'] == "Seasonal Employees") ? "selected" : "" ?>>Seasonal Employees</option>
                            <option value="Temporary Employees" <?= ($row['employee_status'] == "Temporary Employees") ? "selected" : "" ?>>Temporary Employees</option>
                        </select>
                    </div>

                    <div class="col d-flex align-items-center justify-content-center">
                        <div class="input-group" style="height: 1.4rem;">
                            <span class="input-group-text fw-bold">Employee Id Number</span>
                            <input type="text" class="form-control" placeholder="Enter Employee Id Number"
                                name="employement_num" value="<?= $row['employement_num'] ?>">
                        </div>
                    </div>

                    <div class="col d-flex align-items-center justify-content-center">
                        <div class="input-group" style="height: 1.4rem;">
                            <span class="input-group-text fw-bold">Date of Hire</span>
                            <input type="date" class="form-control" name="hire_date" value="<?= $row['hire_date'] ?>">
                        </div>
                    </div>
                </div>

                <hr>
                <h5>Salary & Deduction Details</h5>
                <hr>

                <?php
                $bill_sql = "SELECT * FROM `tbl_bill` WHERE `bill_id` = '{$row['account_id']}' ";
                $bill_res = $conn->query($bill_sql);
                $bill = $bill_res->fetch_assoc();
                ?>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">SSS Number</span>
                    <input type="text" class="form-control" placeholder="Enter SSS number" name="sss"
                        value="<?= $bill['sss'] ?>">
                    <span class="input-group-text fw-bold">Pag-Ibig Number</span>
                    <input type="text" class="form-control" placeholder="Enter Pag-Ibig Number" name="pagibig"
                        value="<?= $bill['pagibig'] ?>">
                    <span class="input-group-text fw-bold">PhilHealth Number</span>
                    <input type="text" class="form-control" placeholder="Enter PhilHealth Number" name="phil"
                        value="<?= $bill['phil'] ?>">
                    <span class="input-group-text fw-bold">Basic Salary</span>
                    <input type="number" class="form-control" placeholder="Enter Basic Salary" name="salary"
                        value="<?= $row['salary'] ?>">
                </div>

                <hr>
                <h5>Emergency Contact</h5>
                <hr>

                <?php
                $spouse_sql = "SELECT * FROM `tbl_spouse` WHERE `spouse_id` = '{$row['account_id']}' ";
                $spouse_res = $conn->query($spouse_sql);
                $spouse = $spouse_res->fetch_assoc();
                ?>

                <div class="row row-col-3 input-group mb-3 mt-3">
                    <div class="col input-group">
                        <span class="input-group-text fw-bold">Name of Spouse/Guardian</span>
                        <input type="text" class="form-control" placeholder="Enter Name of Spouse/Guardian"
                            name="spouse_name" value="<?= $spouse['spouse_name'] ?>">
                    </div>
                    <div class="col input-group">
                        <span class="input-group-text fw-bold">Relationship</span>
                        <input type="text" class="form-control" placeholder="Enter Relationship" name="sg_relationship" value="<?= $spouse['relationship'] ?>">
                    </div>
                    <div class="col input-group">
                        <span class="input-group-text fw-bold">Spouse/Guardian Phone Number</span>
                        <input type="number" class="form-control" placeholder="Enter Spouse/Guardian Phone Number"
                            name="sg_phone_num" value="<?= $spouse['number'] ?>">
                    </div>
                </div>
                <div class="row row-col-3 input-group mb-3 mt-3">
                    <div class="col input-group">
                        <span class="input-group-text fw-bold">Spouse/Guardian Email</span>
                        <input type="email" class="form-control" placeholder="Enter Spouse/Guardian Email"
                            name="sg_email" value="<?= $spouse['email'] ?>">
                    </div>
                    <div class="col input-group">
                        <span class="input-group-text fw-bold">Barangay</span>
                        <input type="text" class="form-control" placeholder="Enter Barangay" name="sg_brgy" value="<?= $spouse['brgy'] ?>">
                    </div>
                    <div class="col input-group">
                        <span class="input-group-text fw-bold">Municipality</span>
                        <input type="text" class="form-control" placeholder="Enter Municipality" name="sg_municipal" value="<?= $spouse['municipality'] ?>">
                    </div>
                </div>
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