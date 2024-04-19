<?php
session_start();
$_SESSION['title'] = 'Admin Page';
include '../dashboard/header.php';
include '../../config/dbcon.php';
?>
<?php
include '../dashboard/nav.php';
date_default_timezone_set('Asia/Manila');
$currentDate = date("Y-m-d");
?>
<div class="container mt-5 text-white">
    <h1 class="text-center mb-4">Dashboard</h1>
    <h4 id="system-time" class="text-center mb-4">System Time: </h4>
</div>
<script>
    // Function to update system time
    function updateSystemTime() {
        var systemTimeElement = document.getElementById('system-time');
        var now = new Date();
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' };
        var formattedTime = now.toLocaleDateString('en-US', options);
        systemTimeElement.textContent = 'System Time: ' + formattedTime;
    }

    // Update system time every second
    setInterval(updateSystemTime, 1000);

    // Initial call to update system time
    updateSystemTime();
</script>

<div class="row row-cols-2 m-5">
    <!-- Card 1: Users -->
    <div class="col">
        <div class="card bg-dark text-white">
            <div class="card-body">
                <?php
                $sql = "SELECT COUNT(*) as admin FROM `tbl_employee_account` WHERE `login_role` = 1;";
                $res = $conn->query($sql);
                $admin = $res->fetch_assoc();

                $sql = "SELECT COUNT(*) as employee FROM `tbl_employee_account` WHERE `login_role` = 2;";
                $res = $conn->query($sql);
                $employee = $res->fetch_assoc();

                $sql = "SELECT COUNT(*) as client FROM `tbl_client_account`";
                $res = $conn->query($sql);
                $client = $res->fetch_assoc();
                ?>
                <h5 class="card-title">Users</h5>
                <p class="card-text">Total Staff: <?= $employee['employee'] ?></p>
                <p class="card-text">Total Admin: <?= $admin['admin'] ?></p>
                <p class="card-text">Total Client: <?= $client['client'] ?></p>
                <a href="users_mgt.php" class="btn btn-primary">View Details</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card bg-dark text-white">
            <div class="card-body">
                <?php
                $sql = "SELECT COUNT(*) as today FROM `tbl_attendance` WHERE DATE(`date`) = CURDATE();";
                $res = $conn->query($sql);
                $today = $res->fetch_assoc();

                $sql = "SELECT COUNT(*) as weekly FROM `tbl_attendance` WHERE YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1);";
                $res = $conn->query($sql);
                $weekly = $res->fetch_assoc();

                $sql = "SELECT COUNT(*) as monthly FROM `tbl_attendance` WHERE MONTH(`date`) = MONTH(CURDATE()) AND YEAR(`date`) = YEAR(CURDATE())";
                $res = $conn->query($sql);
                $monthly = $res->fetch_assoc();

                ?>
                <h5 class="card-title">Attendance</h5>
                <p class="card-text">Today Attendance: <?= $today['today'] ?></p>
                <p class="card-text">Weekly Attendance: <?= $weekly['weekly'] ?></p>
                <p class="card-text">Monthly Attendance: <?= $monthly['monthly'] ?></p>
                <a href="attendance.php" class="btn btn-primary">View Details</a>
            </div>
        </div>
    </div>
</div>
<?php
include '../dashboard/footer.php';
?>