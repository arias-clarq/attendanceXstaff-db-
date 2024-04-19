<style>
    h5 {
        text-align: center;
    }
</style>
<!-- The Edit User Modal -->
<div class="modal fade" id="view_acc<?= $row['account_id'] ?>" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Account Information</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <h5>Employee Personal Information</h5>
                <hr>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Name</span>
                    <input type="text" class="form-control" value="<?= $row['lastname'] ?>" placeholder="Last Name"
                        name="lname" readonly>
                    <input type="text" class="form-control" value="<?= $row['firstname'] ?>" placeholder="First Name"
                        name="fname" readonly>
                    <input type="text" class="form-control" value="<?= $row['middlename'] ?>" placeholder="Middle Name"
                        name="mname" readonly>
                </div>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Age</span>
                    <input class="form-control" value="<?= $row['age'] ?>" min="0" placeholder="Enter Age" type="number"
                        name="age" readonly>
                </div>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Birthday</span>
                    <input class="form-control" value="<?= $row['birthdate'] ?>" type="date" name="bday" readonly>
                </div>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Gender</span>
                    <input class="form-control" value="<?= $row['gender'] ?>" type="text" readonly>
                </div>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Marital Status</span>
                    <input class="form-control" value="<?= $row['marital_status'] ?>" type="text" readonly>
                </div>

                <hr>
                <h5>Contact Information</h5>
                <hr>

                <div class="mb-3 mt-3">
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Email</span>
                        <input class="form-control" placeholder="Enter Email" value="<?= $row['email'] ?>" type="email"
                            name="email" readonly />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Phone no.</span>
                        <input class="form-control" maxlength="11" placeholder="Enter Phone Number" type="phone"
                            name="phone" value="<?= $row['phone_num'] ?>" readonly>
                    </div>
                </div>

                <hr>
                <h5>Address Details</h5>
                <hr>

                <!-- location -->
                <div class="row row-col-2 mb-3">
                    <div class="col">
                        <label class="form-label fw-bold">Province:</label>
                        <input class="form-control" value="<?= $row['province'] ?>" type="text" name="province"
                            readonly>
                    </div>

                    <div class="col ">
                        <label class="form-label fw-bold">Zip:</label>
                        <div class="col d-flex align-items-center justify-content-center">
                            <div class="input-group" style="height: 1.4rem;">
                                <span class="input-group-text fw-bold">Zip</span>
                                <input class="form-control" value="<?= $row['zip'] ?>" placeholder="Enter zip code"
                                    type="text" name="zip" readonly>
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
                            placeholder="Enter Elementary" name="elem" readonly>
                        <input type="text" value="<?= $row['jhs'] ?>" class="form-control"
                            placeholder="Enter Junior Highschool" name="jhs" readonly>
                        <input type="text" value="<?= $row['shs'] ?>" class="form-control"
                            placeholder="Enter Senior Highschool" name="shs" readonly>
                        <input type="text" value="<?= $row['college'] ?>" class="form-control"
                            placeholder="Enter College" name="college" readonly>
                    </div>
                </div>

                <hr>
                <h5>Employment Details</h5>
                <hr>

                <div class="row row-col-5 mb-3 mt-3">

                    <div class="col input-group">
                        <span class="input-group-text fw-bold">Job</span>
                        <input class="form-control" value="<?= $row['job_title'] ?>" type="text" readonly>
                    </div>


                    <div class="col input-group">
                        <span class="input-group-text fw-bold">Department</span>
                        <input class="form-control" value="<?= $row['department'] ?>" type="text" readonly>
                    </div>

                    <div class="col input-group">
                        <span class="input-group-text fw-bold">Employement Status</span>
                        <input class="form-control" value="<?= $row['employee_status'] ?>" type="text" readonly>
                    </div>

                    <div class="col d-flex align-items-center justify-content-center">
                        <div class="input-group" style="height: 1.4rem;">
                            <span class="input-group-text fw-bold">Employee Id Number</span>
                            <input type="text" class="form-control" placeholder="Enter Employee Id Number"
                                name="employement_num" value="<?= $row['employement_num'] ?>" readonly>
                        </div>
                    </div>

                    <div class="col d-flex align-items-center justify-content-center">
                        <div class="input-group" style="height: 1.4rem;">
                            <span class="input-group-text fw-bold">Date of Hire</span>
                            <input type="date" class="form-control" name="hire_date" value="<?= $row['hire_date'] ?>"
                                readonly>
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
                        value="<?= $bill['sss'] ?>" readonly>
                    <span class="input-group-text fw-bold">Pag-Ibig Number</span>
                    <input type="text" class="form-control" placeholder="Enter Pag-Ibig Number" name="pagibig"
                        value="<?= $bill['pagibig'] ?>" readonly>
                    <span class="input-group-text fw-bold">PhilHealth Number</span>
                    <input type="text" class="form-control" placeholder="Enter PhilHealth Number" name="phil"
                        value="<?= $bill['phil'] ?>" readonly>
                    <span class="input-group-text fw-bold">Basic Salary</span>
                    <input type="number" class="form-control" placeholder="Enter Basic Salary" name="salary"
                        value="<?= $row['salary'] ?>" readonly>
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
                            name="spouse_name" value="<?= $spouse['spouse_name'] ?>" readonly>
                    </div>
                    <div class="col input-group">
                        <span class="input-group-text fw-bold">Relationship</span>
                        <input type="text" class="form-control" placeholder="Enter Relationship" name="sg_relationship"
                            value="<?= $spouse['relationship'] ?>" readonly>
                    </div>
                    <div class="col input-group">
                        <span class="input-group-text fw-bold">Spouse/Guardian Phone Number</span>
                        <input type="number" class="form-control" placeholder="Enter Spouse/Guardian Phone Number"
                            name="sg_phone_num" value="<?= $spouse['number'] ?>" readonly>
                    </div>
                </div>
                <div class="row row-col-3 input-group mb-3 mt-3">
                    <div class="col input-group">
                        <span class="input-group-text fw-bold">Spouse/Guardian Email</span>
                        <input type="email" class="form-control" placeholder="Enter Spouse/Guardian Email"
                            name="sg_email" value="<?= $spouse['email'] ?>" readonly>
                    </div>
                    <div class="col input-group">
                        <span class="input-group-text fw-bold">Barangay</span>
                        <input type="text" class="form-control" placeholder="Enter Barangay" name="sg_brgy"
                            value="<?= $spouse['brgy'] ?>" readonly>
                    </div>
                    <div class="col input-group">
                        <span class="input-group-text fw-bold">Municipality</span>
                        <input type="text" class="form-control" placeholder="Enter Municipality" name="sg_municipal"
                            value="<?= $spouse['municipality'] ?>" readonly>
                    </div>
                </div>
                <hr>

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>