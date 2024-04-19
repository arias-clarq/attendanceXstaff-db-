<?php
session_start();
include_once '../dbcon.php';
if(isset($_POST['delete'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM `tbl_client_account` WHERE `client_id` = $id";
    $result = $conn->query($sql);
    if ($result !== true) {
        echo 'Failed to delete client' . $conn->error;
    }

    $sql = "DELETE FROM `tbl_client_info` WHERE `client_info_id` = $id";
    $result = $conn->query($sql);
    if ($result !== true) {
        echo 'Failed to delete client' . $conn->error;
    }else{
        $_SESSION['confirm_msg'] = "Successfuly Delete Client Account";
        header("location: ../../pages/admin/users_mgt.php");
    }
}