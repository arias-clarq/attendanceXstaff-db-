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

    $job_title = $conn->escape_string($_POST['job_title']);
    $department = $conn->escape_string($_POST['department']);
    $employment_status = $conn->escape_string($_POST['employment_status']);
    $employement_num = $_POST['employement_num'];
    $hire_date = $_POST['hire_date'];
    $salary = $_POST['salary'];

    $spouse_name = $conn->escape_string($_POST['spouse_name']);
    $sg_relationship = $conn->escape_string($_POST['sg_relationship']);
    $sg_phone_num = $_POST['sg_phone_num'];
    $sg_email = $conn->escape_string($_POST['sg_email']);
    $sg_brgy = $conn->escape_string($_POST['sg_brgy']);
    $sg_municipal = $conn->escape_string($_POST['sg_municipal']);

    $sss = $conn->escape_string($_POST['sss']);
    $pagibig = $conn->escape_string($_POST['pagibig']);
    $phil = $conn->escape_string($_POST['phil']);



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

    $sql = "INSERT INTO `tbl_employement`
    (`job_id`, 
    `job_title`, 
    `employement_num`, 
    `department`, 
    `hire_date`, 
    `employee_status`, 
    `salary`) 
    VALUES 
    ('$id',
    '$job_title',
    '$employement_num',
    '$department',
    '$hire_date',
    '$employment_status',
    '$salary')";
    $result = $conn->query($sql);
    if ($result !== true) {
        echo 'Failed to insert new user_employement' . $conn->error;
    }

    $sql = "INSERT INTO `tbl_spouse`(`spouse_id`, `spouse_name`, `relationship`, `number`, `email`, `brgy`, `municipality`) 
    VALUES ('$id','$spouse_name','$sg_relationship','$sg_phone_num','$sg_email','$sg_brgy','$sg_municipal')";
    
    $result = $conn->query($sql);
    if ($result !== true) {
        echo 'Failed to insert new user_spouse' . $conn->error;
    }

    $sql = "INSERT INTO `tbl_bill`(`bill_id`, `sss`, `pagibig`, `phil`) VALUES ('$id','$sss','$pagibig','$phil')";
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