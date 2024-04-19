<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance X Staff</title>
    <?php
    include 'assets/bootstrap.php';
    include 'assets/fontawesome.php';
    ?>
</head>

<body>
    <style>
        .gradient-custom {
            background: #6a11cb;
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
    </style>

    <section class="vh-100 gradient-custom">
        <div class="container-fluid py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-7"> <!-- Increased width -->
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Register Account</h2>
                                <p class="text-white mb-5">Hi Client👋 You can register your account here</p>

                                <form action="config/register.php" method="post">
                                    <div class="row form-outline form-white mb-4">
                                        <div class="col input-group ">
                                            <span class="input-group-text fw-bold">Username</span>
                                            <input type="text" class="form-control form-control"
                                                placeholder="Enter Username" name="username" required />
                                        </div>
                                        <div class="col input-group ">
                                            <span class="input-group-text fw-bold">Password</span>
                                            <input type="password" placeholder="Enter Password"
                                                class="form-control form-control" name="password" required />
                                        </div>
                                    </div>

                                    <div class="form-outline input-group form-white mb-4">
                                        <span class="input-group-text fw-bold">Name</span>
                                        <input type="text" placeholder="Enter Firstname" class="form-control form-control"
                                            name="firstname" required />
                                        <input type="text" placeholder="Enter Middlename" class="form-control form-control"
                                            name="middlename" required />
                                        <input type="text" placeholder="Enter Lastname" class="form-control form-control"
                                            name="lastname" required />

                                    </div>

                                    <div class="row row-col-2 form-outline form-white mb-4">
                                        <div class="col input-group">
                                            <span class="input-group-text fw-bold">Gender</span>
                                            <select name="gender" class="form-select" required>
                                                <option selected disabled>Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col input-group">
                                            <span class="input-group-text fw-bold">Age</span>
                                            <input type="number" placeholder="Enter age" min=0
                                                class="form-control form-control" name="age" required />
                                        </div>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <div class="input-group">
                                            <span class="input-group-text fw-bold">Address</span>
                                            <input type="text" placeholder="Enter Barangay" class="form-control form-control"
                                                name="barangay" required />
                                            <input type="text" placeholder="Enter Municipality"
                                                class="form-control form-control" name="municipality" required />
                                            <input type="text" placeholder="Enter Province" class="form-control form-control"
                                                name="province" required />
                                        </div>
                                    </div>

                                    <div class="row row-col-3 form-outline form-white mb-4">
                                        <div class="col input-group">
                                            <span class="input-group-text fw-bold">Birthdate</span>
                                            <input type="date" class="form-control form-control"
                                            name="bdate" required />
                                        </div>
                                        <div class="col input-group">
                                            <span class="input-group-text fw-bold">Phone Number</span>
                                            <input type="phone" placeholder="Enter phone number" maxlength="11"
                                                class="form-control form-control" name="phone_num" required />
                                        </div>
                                        <div class="col input-group">
                                            <span class="input-group-text fw-bold">Zip code</span>
                                            <input type="text" placeholder="Enter zip code"
                                                class="form-control form-control" name="zip_code" required />
                                        </div>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="button"
                                        data-bs-toggle="modal" data-bs-target="#register">Confirm</button>

                                    <!-- The Register Client Modal -->
                                    <div class="modal fade" id="register">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-dark">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Confirmation</h4>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body text-center">
                                                    <h5>Do you want to proceed?</h5>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" name="register"
                                                        class="btn btn-success">Confirm</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    session_unset();
    ?>
</body>

</html>