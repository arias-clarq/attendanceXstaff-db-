<?php
session_start();
include_once '../dbcon.php';

if(isset($_POST['delete'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM `tbl_employee_account` WHERE `account_id` = $id";
    $result = $conn->query($sql);
    if ($result !== true) {
        echo 'Failed to delete user' . $conn->error;
    }

    $sql = "DELETE FROM `tbl_employee_info` WHERE `employee_info_id` = $id";
    $result = $conn->query($sql);
    if ($result !== true) {
        echo 'Failed to delete user-info' . $conn->error;
    }

    $sql = "DELETE FROM `tbl_employement` WHERE `job_id` = $id";
    $result = $conn->query($sql);
    if ($result !== true) {
        echo 'Failed to delete user-employement' . $conn->error;
    }

    $sql = "DELETE FROM `tbl_bill` WHERE `bill_id` = $id";
    $result = $conn->query($sql);
    if ($result !== true) {
        echo 'Failed to delete user-bill' . $conn->error;
    }

    $sql = "DELETE FROM `tbl_spouse` WHERE `spouse_id` = $id";
    $result = $conn->query($sql);
    if ($result !== true) {
        echo 'Failed to delete user-spouse' . $conn->error;
    }else{
        $_SESSION['confirm_msg'] = "Successfuly Delete User";
        header("location: ../../pages/admin/users_mgt.php");
    }
}