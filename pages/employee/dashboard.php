<?php
session_start();
$_SESSION['title'] = 'Employee Page';
include '../dashboard/header.php';
include '../../config/dbcon.php';
date_default_timezone_set('Asia/Manila');
$currentDate = date("Y-m-d");
$id = $_SESSION['login_id'];
?>
<?php
include '../dashboard/nav.php';
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
<?php
$sql = "SELECT * FROM `tbl_attendance` WHERE `account_id` = '$id' AND `date` = '$currentDate' AND timeout is not null";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $_SESSION['isTimein'] = true;
    $_SESSION['isTimeOut'] = true;
}
?>

<!-- messages -->
<div class="row justify-content-center text-center">
    <?php
    if (isset($_SESSION["message"])) {
        ?>
        <div class="col-lg-3 alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>
                <?= $_SESSION["message"] ?>
            </strong>
        </div>
        <?php
    } else if (isset($_SESSION["e_message"])) { ?>
            <div class="col-lg-3 alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>
                <?= $_SESSION["e_message"] ?>
                </strong>
            </div>
    <?php }
    unset($_SESSION["message"]);
    unset($_SESSION["e_message"]);
    ?>
</div>

<div class="row row-col-2 justify-content-center">
    <div class="col-lg-1">
        <form action="../../config/employee/attendance.php" method="post">
            <div class="card-body text-center">
                <button name="btn_timein" type="submit" class="btn btn-success btn-lg btn-block" <?= (isset($_SESSION['isTimein']) == true) ? 'disabled' : '' ?>>Time In</button>
            </div>
        </form>
    </div>

    <div class="col-lg-1">
        <form action="../../config/employee/attendance.php" method="post">
            <div class="card-body text-center">
                <button name="btn_timeout" type="submit" class="btn btn-danger btn-lg btn-block" <?= (isset($_SESSION['isTimeOut']) == true) ? 'disabled' : '' ?>>Time Out</button>
            </div>
        </form>
    </div>
</div>

<div class="row justify-content-center mt-5 text-white">
    <div class="col-lg-6">
        <h2 class="text-center">Your Attendance</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Time-In</th>
                    <th>Time-Out</th>
                    <th>Status</th>
                    <th>Worktime Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `tbl_employee_account` 
                INNER JOIN tbl_employee_info ON tbl_employee_account.employee_info_id = tbl_employee_info.employee_info_id
                INNER JOIN tbl_attendance ON tbl_employee_account.account_id = tbl_attendance.account_id
                INNER JOIN tbl_worktime_status ON tbl_worktime_status.worktime_status_id = tbl_attendance.worktime_status_id
                INNER JOIN tbl_status ON tbl_status.status_id = tbl_attendance.status_id
                WHERE tbl_employee_account.account_id = $id";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $timein = strtotime($row['timein']);
                    if ($row['timeout'] != null) {
                        $timeout = strtotime($row['timeout']);
                    }
                    ?>
                    <tr>
                        <td></td>    
                        <td><?= $row['date'] ?></td>
                        <td class="text-capitalize"><?= $row['lastname'] . ' , ' . $row['firstname'] . ' ' . $row['middlename'] ?></td>
                        <td>
                            <?= date('h:i A', $timein) ?>
                        </td>
                        <td>
                            <?= ($row['timeout'] != null) ? date('h:i A', $timeout) : 'Pending..' ?>
                        </td>
                        <td>
                            <?= $row['status'] ?>
                        </td>
                        <td>
                            <?= $row['worktime_status'] ?>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>

</div>

<?php
include '../dashboard/footer.php';
?>