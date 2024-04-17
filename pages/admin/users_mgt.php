<?php
session_start();
$_SESSION['title'] = 'User MGT';
include '../dashboard/header.php';
?>
<?php
include '../dashboard/nav.php';
include '../../config/dbcon.php';
include '../../config/function.php';
?>

<div class="container mt-5">
    <h2 class='text-white'>Users Management</h2>
    <!-- action msg here -->
    <?php
    if (isset($_SESSION['confirm_msg'])) {
        ?>
        <div class="alert alert-success  alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>
                <?= $_SESSION['confirm_msg'] ?>
            </strong>
        </div>
        <?php
    } elseif (isset($_SESSION['deleteMsg'])) { ?>
        <div class="alert alert-danger  alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>
                <?= $_SESSION['deleteMsg'] ?>
            </strong>
        </div>
    <?php }
    unset($_SESSION['deleteMsg']);
    unset($_SESSION['confirm_msg']);
    ?>

    <table class="table table-hover">

        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#add_acc">
            <i class="fa-solid fa-user-plus"></i>
        </button>

        <thead>
            <!-- <tr>
                <form action="../../config/employee/add.php" method="post">
                    
                </form>
            </tr> -->
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Password</th>
                <th>Login Role</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $login_id = $_SESSION['login_id'];
            $sql = "SELECT * FROM `tbl_employee_account` 
            INNER JOIN tbl_employee_info ON tbl_employee_account.employee_info_id = tbl_employee_info.employee_info_id
            INNER JOIN tbl_employement ON tbl_employee_account.job_id = tbl_employement.job_id 
            WHERE account_id != $login_id";
            $res = $conn->query($sql);

            while ($row = $res->fetch_assoc()) {
                ?>
                <tr>
                    <th></th>
                    <th><?= $row['username'] ?></th>
                    <th>********</th>
                    <th><?= login_role($row['login_role']) ?></th>
                    <th>
                        <div class="text-center">
                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#edit_acc<?= $row['account_id'] ?>">
                                <i class="fa-solid fa-user-pen"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete_user<?= $row['account_id'] ?>">
                                <i class="fa-solid fa-user-minus"></i>
                            </button>
                        </div>
                        <?php include 'modals/edit_account.php'; ?>
                        <?php include 'modals/del.php'; ?>
                    </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include 'modals/add_account.php'; ?>
<?php
include '../dashboard/footer.php';
?>