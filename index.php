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
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Attendance X Staff&Client System</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                <!-- action msg here -->
                                <?php
                                if (isset($_SESSION['error_msg'])) {
                                    ?>
                                    <div class="alert alert-danger  alert-dismissible">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        <strong>
                                            <?= $_SESSION['error_msg'] ?>
                                        </strong>
                                    </div>
                                    <?php
                                } ?>
                                <?php
                                if (isset($_SESSION['success_msg'])) {
                                    ?>
                                    <div class="alert alert-success  alert-dismissible">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        <strong>
                                            <?= $_SESSION['success_msg'] ?>
                                        </strong>
                                    </div>
                                    <?php
                                } ?>

                                <form action="config/login.php" method="post">
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder="Enter Username" name="username" required />
                                        <label class="form-label">Username</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" placeholder="Enter Password"
                                            class="form-control form-control-lg" name="password" required />
                                        <label class="form-label">Password</label>
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" name="login"
                                        type="submit">Login</button>
                                    <a href="register.php" class="btn btn-outline-light btn-lg px-5" name="login"
                                        type="button">Register</a>
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