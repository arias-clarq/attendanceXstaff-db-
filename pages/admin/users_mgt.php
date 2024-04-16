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
        <thead>
            <tr>
                <form action="../../config/employee/add.php" method="post">
                    <th></th>
                    <th><input class="form-control" placeholder="Enter username" type="text" name="username" required>
                    </th>
                    <th><input class="form-control" placeholder="Enter password" type="text" name="password" required>
                    </th>
                    <th>
                        <select name="login_role" class="form-select">
                            <option value="1">Admin</option>
                            <option value="2">Employee</option>
                        </select>
                    </th>
                    <th class="text-center">
                        <button class="btn btn-success btn-block" type="submit" name="add"><i
                                class="fa-solid fa-user-plus"></i></button>
                    </th>
                </form>
            </tr>
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
            $sql = "SELECT * FROM `tbl_employee_account` WHERE account_id != $login_id";
            $res = $conn->query($sql);

            while ($row = $res->fetch_assoc()) {
                ?>
                <tr>
                    <th></th>
                    <th><?= $row['username'] ?></th>
                    <th>********</th>
                    <th><?= login_role($row['login_role']) ?></th>
                    <th class="text-center">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#edit_user<?= $row['account_id'] ?>">
                            <i class="fa-solid fa-user-pen"></i>
                        </button>
                        <?php include 'modals/edit.php'; ?>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete_user<?= $row['account_id'] ?>">
                            <i class="fa-solid fa-user-minus"></i>
                        </button>
                        <?php include 'modals/del.php'; ?>
                    </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
include '../dashboard/footer.php';
?>