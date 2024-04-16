<?php
session_start();
include_once '../dbcon.php';
if (isset($_POST['add'])) {
    $username = $conn->escape_string($_POST['username']);
    $password = $conn->escape_string($_POST['password']);
    $login_role = $_POST['login_role'];

    $sql = "INSERT INTO `tbl_employee_account`(`username`, `password`, `login_role`) VALUES ('{$username}','{$password}','{$login_role}')";
    $result = $conn->query($sql);

    $id = $conn->insert_id;

    if ($result !== true) {
        echo 'Failed to insert new user' . $conn->error;
    }

    $sql = "INSERT INTO `tbl_employee_info`(`employee_info_id`, `spouse_id`, `bill_id`) VALUES ('$id','$id','$id')";
    $result = $conn->query($sql);
    if ($result !== true) {
        echo 'Failed to insert new user_info' . $conn->error;
    }

    $sql = "INSERT INTO `tbl_employement`(`job_id`) VALUES ('$id')";
    $result = $conn->query($sql);
    if ($result !== true) {
        echo 'Failed to insert new user_employement' . $conn->error;
    }

    $sql = "INSERT INTO `tbl_spouse`(`spouse_id`) VALUES ('$id')";
    $result = $conn->query($sql);
    if ($result !== true) {
        echo 'Failed to insert new user_spouse' . $conn->error;
    }

    $sql = "INSERT INTO `tbl_bill`(`bill_id`) VALUES ('$id')";
    $result = $conn->query($sql);
    if ($result !== true) {
        echo 'Failed to insert new user_spouse' . $conn->error;
    }

    $sql = "UPDATE `tbl_employee_account` SET `employee_info_id`=$id, `job_id`=$id WHERE `account_id` = $id";
    $result = $conn->query($sql);

    if ($result !== true) {
        echo 'Failed to insert new user' . $conn->error;
    } else {
        $_SESSION['confirm_msg'] = "Successfuly Add New User";
        header("location: ../../pages/admin/users_mgt.php");
    }
}