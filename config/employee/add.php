<?php
session_start();
include_once '../dbcon.php';
if (isset($_POST['add'])) {
    $username = $conn->escape_string($_POST['username']);
    $password = $conn->escape_string($_POST['password']);
    $login_role = $_POST['login_role'];

    $fname = $conn->escape_string($_POST['fname']);
    $mname = $conn->escape_string($_POST['mname']);
    $lname = $conn->escape_string($_POST['lname']);

    $email = $conn->escape_string($_POST['email']);
    $phone = $_POST['phone'];
    $age = $_POST['age'];

    $bday = $_POST['bday'];
    $gender = $_POST['gender'];
    $marital_status = $_POST['marital_status'];

    $province = $conn->escape_string($_POST['province']);
    $zip = $_POST['zip'];

    $elem = $conn->escape_string($_POST['elem']);
    $jhs = $conn->escape_string($_POST['jhs']);
    $shs = $conn->escape_string($_POST['shs']);
    $college = $conn->escape_string($_POST['college']);

    $sql = "INSERT INTO `tbl_employee_account`(`username`, `password`, `login_role`) VALUES ('{$username}','{$password}','{$login_role}')";
    $result = $conn->query($sql);

    $id = $conn->insert_id;

    if ($result !== true) {
        echo 'Failed to insert new user' . $conn->error;
    }

    $sql = "INSERT INTO `tbl_employee_info`
    (`employee_info_id`, 
    `spouse_id`, 
    `bill_id`, 
    `firstname`, 
    `middlename`, 
    `lastname`, 
    `birthdate`, 
    `gender`, 
    `age`, 
    `marital_status`, 
    `email`, 
    `phone_num`, 
    `province`, 
    `zip`, 
    `elem`, 
    `jhs`, 
    `shs`, 
    `college`) 
    VALUES 
    ('$id',
    '$id',
    '$id',
    '$fname',
    '$mname',
    '$lname',
    '$bday',
    '$gender',
    '$age',
    '$marital_status',
    '$email',
    '$phone',
    '$province',
    '$zip',
    '$elem',
    '$jhs',
    '$shs',
    '$college')";

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