<?php
session_start();
include_once 'dbcon.php';

if(isset($_POST['register'])){
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

    $sql="INSERT INTO `tbl_client_account`(`username`, `password`) VALUES ('$username','$password')";
    $result = $conn->query($sql);
    $id = $conn->insert_id;

    if($result !== true){
        $_SESSION['error_msg'] = "failed to registered account";
        header('location: ../index.php');
    }

    $sql="UPDATE `tbl_client_account` SET `client_info_id`= '$id' WHERE `client_id` = $id";
    $result = $conn->query($sql);
    if($result !== true){
        $_SESSION['error_msg'] = "failed to registered account";
        header('location: ../index.php');
    }

    $sql="INSERT INTO `tbl_client_info`(`client_info_id`, `firstname`, `lastname`, `middlename`, `birthdate`, `gender`, `age`, `phone_num`, `brgy`, `municipality`, `province`, `zip_code`) 
    VALUES ('$id','$firstname','$lastname','$middlename','$bdate','$gender','$age','$phone_num','$barangay','$municipality','$province','$zip_code')";
    $result = $conn->query($sql);
    $id = $conn->insert_id;

    if($result !== true){
        $_SESSION['error_msg'] = "failed to registered account";
        header('location: ../index.php');
    }else{
        $_SESSION['success_msg'] = "successfuly registered account";
        header('location: ../index.php');
    }
}