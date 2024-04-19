<?php
session_start();
include_once 'dbcon.php';

if(isset($_POST['login'])){
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM `tbl_employee_account` WHERE `username` = '{$username}' AND `password` = '{$password}' ";
    $result = $conn->query($sql);

    $clientsql = "SELECT * FROM `tbl_client_account` WHERE `username` = '{$username}' AND `password` = '{$password}' ";
    $clientresult = $conn->query($clientsql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $login_role = $row['login_role'];

        // enable login session
        $_SESSION['login_session'] = true;
        // set account id
        $_SESSION['login_id'] = $row['account_id'];
        $_SESSION['login_role'] = $row['login_role'];

        if($login_role == 1){
            header('location: ../pages/admin/dashboard.php');
        }else if($login_role == 2){
            header('location: ../pages/employee/dashboard.php');
        }
    }else if($clientresult->num_rows > 0) {
        $row = $clientresult->fetch_assoc();

        $_SESSION['login_id'] = $row['client_id'];
        $_SESSION['login_session'] = true;
        header('location: ../pages/client/dashboard.php');
    } else {
       $_SESSION['error_msg'] = "Invalid Username or Password";
       header('location: ../index.php');
    }
}