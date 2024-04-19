<?php
session_start();
include_once '../dbcon.php';

if(isset($_POST['edit'])){
    $id = $_POST['client_id'];
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $firstname = $conn->real_escape_string($_POST['firstname']);
    $middlename = $conn->real_escape_string($_POST['middlename']);
    $lastname = $conn->real_escape_string($_POST['lastname']);

    $gender = $conn->real_escape_string($_POST['gender']);
    $age = $_POST['age'];

    $barangay = $conn->real_escape_string($_POST['barangay']);
    $municipality = $conn->real_escape_string($_POST['municipality']);
    $province = $conn->real_escape_string($_POST['province']);

    $bdate = $conn->real_escape_string($_POST['bdate']);
    $phone_num = $conn->real_escape_string($_POST['phone_num']);
    $zip_code = $conn->real_escape_string($_POST['zip_code']);

    $sql="UPDATE `tbl_client_account` SET `username`='$username',`password`='$password' WHERE `client_id` = $id";
    $result = $conn->query($sql);

    if($result !== true){
        $_SESSION['error_msg'] = "failed to registered account";
        header("location: ../../pages/admin/users_mgt.php");
    }

    $sql="UPDATE `tbl_client_info` 
    SET `firstname`='$firstname',
    `lastname`='$lastname',
    `middlename`='$middlename',
    `birthdate`='$bdate',
    `gender`='$gender',
    `age`='$age',
    `phone_num`='$phone_num',
    `brgy`='$barangay',
    `municipality`='$municipality',
    `province`='$province',
    `zip_code`='$zip_code' WHERE `client_info_id` = $id";
    $result = $conn->query($sql);


    if($result !== true){
        $_SESSION['error_msg'] = "failed to registered account";
        header("location: ../../pages/admin/users_mgt.php");
    } else {
        $_SESSION['confirm_msg'] = "Successfuly Change Client Information";
        header("location: ../../pages/admin/users_mgt.php");
    }
}