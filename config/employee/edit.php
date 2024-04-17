<?php
session_start();
include_once '../dbcon.php';

if(isset($_POST['edit'])){
    $id = $_POST['id'];
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

    $job_title = $conn->escape_string($_POST['job_title']);
    $employement_num = $conn->escape_string($_POST['employement_num']);
    $department_num = $conn->escape_string($_POST['department_num']);
    $hire_date = $_POST['hire_date'];
    $employee_status = $conn->escape_string($_POST['employee_status']);
    $job_value = $_POST['job_value'];
    $dep_value = $_POST['dep_value'];
    $stat_value = $_POST['stat_value'];
    $salary = $_POST['salary'];

    $sql = "UPDATE `tbl_employee_account` SET `username`='$username',`password`='$password',`login_role`='$login_role' WHERE `account_id` = $id";
    $result = $conn->query($sql);

    if($result !== true){
        echo 'Failed to update user account' . $conn->error;
    }

    $sql = "UPDATE `tbl_employement`
    SET 
    `job_title`= '{$job_title}',
    `employement_num`= '{$employement_num}',
    `department_number`= '{$department_num}',
    `hire_date`= '{$hire_date}',
    `employee_status`= '{$employee_status}',
    `job_value`= '{$job_value}',
    `dep_value`= '{$dep_value}',
    `stat_value`='{$stat_value}',
    `salary`='{$salary}' 
    WHERE `job_id` = $id";
    $result = $conn->query($sql);

    if($result !== true){
        echo 'Failed to update user account' . $conn->error;
    }

    $sql = "UPDATE `tbl_employee_info` 
    SET `firstname`='$fname',
    `middlename`='$mname',
    `lastname`='$lname',
    `birthdate`='$bday',
    `gender`='$gender',
    `age`='$age',
    `marital_status`='$marital_status',
    `email`='$email',
    `phone_num`='$phone',
    `province`='$province',
    `zip`='$zip',
    `elem`='$elem',
    `jhs`='$jhs',
    `shs`='$shs',
    `college`='$college' 
    WHERE `employee_info_id` = $id";
    $result = $conn->query($sql);
    if($result !== true){
        echo 'Failed to update user account' . $conn->error;
    }  else {
        $_SESSION['confirm_msg'] = "Successfuly Change User Information";
        header("location: ../../pages/admin/users_mgt.php");
    }
}