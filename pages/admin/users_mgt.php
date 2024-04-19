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
<div class="container justify-content-center mt-3">
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
</div>

<div class="container mt-3">
    <h2 class='text-white'>Users Management</h2>

    <table class="table table-hover">

        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#add_acc">
            <i class="fa-solid fa-user-plus"></i>
        </button>

        <thead>
            <tr>
                <th>#</th>
                <th>Fullname</th>
                <th>Password</th>
                <th>Login Role</th>
                <th class="text-center">Action</th>
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
                    <th class="text-capitalize">
                        <?= $row['lastname'] . " , " . $row['firstname'] . " " . $row['middlename'] ?>
                    </th>
                    <th>********</th>
                    <th><?= login_role($row['login_role']) ?></th>
                    <th>
                        <div class="text-center">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#view_acc<?= $row['account_id'] ?>">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#edit_acc<?= $row['account_id'] ?>">
                                <i class="fa-solid fa-user-pen"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete_user<?= $row['account_id'] ?>">
                                <i class="fa-solid fa-user-minus"></i>
                            </button>
                        </div>
                        <?php include 'modals/view_account.php'; ?>
                        <?php include 'modals/edit_account.php'; ?>
                        <?php include 'modals/del.php'; ?>
                    </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="container mt-3">
    <h2 class='text-white'>Client Management</h2>

    <table class="table table-hover">

        <thead>
            <tr>
                <th>Client ID</th>
                <th>Fullname</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $clientSQL = "SELECT * FROM `tbl_client_account` INNER JOIN tbl_client_info ON tbl_client_account.client_info_id = tbl_client_info.client_info_id";
            $res2 = $conn->query($clientSQL);
            while ($client = $res2->fetch_assoc()) {
                ?>
                <tr>
                    <th><?= $client['client_id'] ?></th>
                    <th><?= $client['lastname'] . ' , ' . $client['firstname'] . ' ' . $client['middlename'] ?></th>
                    <th>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Barangay</th>
                                    <th>Municipality</th>
                                    <th>Province</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $client['brgy']?></td>
                                    <td><?= $client['municipality']?></td>
                                    <td><?= $client['province']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </th>
                    <th><?= $client['phone_num'] ?></th>
                    <th>
                        <div class="text-center">
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit_client<?= $client['client_id'] ?>">
                                <i class="fa-solid fa-user-pen"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete_client<?= $client['client_id'] ?>">
                                <i class="fa-solid fa-user-minus"></i>
                            </button>
                        </div>
                        <?php include 'modals/del_client.php'; ?>
                        <?php include 'modals/edit_client.php'; ?>
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