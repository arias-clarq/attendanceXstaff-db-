<div class="modal fade" id="profile_info" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Profile Information</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <hr>
                <div class="mb-3 mt-3">
                    <div class="input-group">
                        <span class="input-group-text fw-bold">Name</span>
                        <input type="text" class="form-control" value="<?= $profile['lastname'] ?>"
                            placeholder="Last Name" name="lname" readonly>
                        <input type="text" class="form-control" value="<?= $profile['firstname'] ?>"
                            placeholder="First Name" name="fname" readonly>
                        <input type="text" class="form-control" value="<?= $profile['middlename'] ?>"
                            placeholder="Middle Name" name="mname" readonly>
                    </div>

                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Email</span>
                        <input class="form-control" placeholder="Email" value="<?= $profile['email'] ?>"
                            type="email" name="email" readonly />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Phone no.</span>
                        <input class="form-control" maxlength="11" placeholder="Phone Number" type="phone"
                            name="phone" value="<?= $profile['phone_num'] ?>" readonly>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Age</span>
                        <input class="form-control" value="<?= $profile['age'] ?>" min="0" placeholder="Age"
                            type="number" name="age" readonly>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text fw-bold">Birthday</span>
                    <input class="form-control" value="<?= date('F j, Y', strtotime($profile['birthdate'])) ?>"
                        type="text" name="bday" readonly>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text fw-bold">Gender</span>
                    <input class="form-control text-capitalize" value="<?= $profile['gender'] ?>" type="text" readonly>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text fw-bold">Marital Status</span>
                    <input class="form-control text-capitalize" value="<?= $profile['marital_status'] ?>" type="text"
                        readonly>
                </div>

                <!-- location -->
                <div class="row row-col-2 mb-3">
                    <div class="col">
                        <label class="form-label fw-bold">Province:</label>
                        <input class="form-control" value="<?= $profile['province'] ?>" type="text" name="province"
                            readonly>
                    </div>

                    <div class="col ">
                        <label class="form-label fw-bold">Zip:</label>
                        <div class="col d-flex align-items-center justify-content-center">
                            <div class="input-group" style="height: 1.4rem;">
                                <span class="input-group-text fw-bold">Zip</span>
                                <input class="form-control" value="<?= $profile['zip'] ?>" placeholder="Enter zip code"
                                    type="text" name="zip" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <div class="input-group">
                        <span class="input-group-text fw-bold">School</span>
                        <input type="text" value="<?= $profile['elem'] ?>" class="form-control"
                            placeholder="Elementary" name="elem" readonly>
                        <input type="text" value="<?= $profile['jhs'] ?>" class="form-control"
                            placeholder="Junior Highschool" name="jhs" readonly>
                        <input type="text" value="<?= $profile['shs'] ?>" class="form-control"
                            placeholder="Senior Highschool" name="shs" readonly>
                        <input type="text" value="<?= $profile['college'] ?>" class="form-control"
                            placeholder="College" name="college" readonly>
                    </div>
                </div>

                <hr>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Job Title</span>
                    <input type="text" value="<?= $profile['job_title'] ?>" class="form-control"
                        placeholder="Job Title" name="job_title" readonly>
                </div>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Employement Number</span>
                    <input type="text" value="<?= $profile['employement_num'] ?>" class="form-control"
                        placeholder="employement number" name="employement_num" readonly>
                </div>

                <div class=" input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Department Number</span>
                    <input type="text" value="<?= $profile['department_number'] ?>" class="form-control"
                        placeholder="department number" name="department_num" readonly>
                </div>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Hire Date</span>
                    <input type="text" value="<?= date('F j, Y', strtotime($profile['hire_date'])) ?>" class="form-control" readonly>
                </div>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Employee Status</span>
                    <input type="text" value="<?= $profile['employee_status'] ?>" class="form-control"
                        placeholder="Employee Status" name="employee_status" readonly>
                </div>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Job Value</span>
                    <input type="number" value="<?= $profile['job_value'] ?>" class="form-control"
                        placeholder="job value" name="job_value" readonly>
                </div>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Department value</span>
                    <input type="number" value="<?= $profile['dep_value'] ?>" class="form-control"
                        placeholder="Department value" name="dep_value" readonly>
                </div>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Statistic Value</span>
                    <input type="number" value="<?= $profile['stat_value'] ?>" class="form-control"
                        placeholder="Statistic Value" name="stat_value" readonly>
                </div>

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text fw-bold">Salary</span>
                    <input type="number" value="<?= $profile['salary'] ?>" class="form-control" placeholder="Enter Salary"
                        name="salary" readonly>
                </div>
                <hr>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profile">
                    Back
                </button>
            </div>

        </div>
    </div>
</div>