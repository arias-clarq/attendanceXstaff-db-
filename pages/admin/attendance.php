<?php
session_start();
$_SESSION['title'] = 'Monitoring Page';
include '../dashboard/header.php';
include '../dashboard/nav.php';

// Initialize variables to store form inputs
$month = isset($_GET['month']) ? $_GET['month'] : '';
$usernameFilter = isset($_GET['username']) ? $_GET['username'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
$id = $_SESSION['login_id'];

// Build the SQL query dynamically based on the filters
$sql = "SELECT * FROM `tbl_employee_account` 
        INNER JOIN tbl_employee_info ON tbl_employee_account.employee_info_id = tbl_employee_info.employee_info_id
        INNER JOIN tbl_attendance ON tbl_employee_account.account_id = tbl_attendance.account_id
        INNER JOIN tbl_worktime_status ON tbl_worktime_status.worktime_status_id = tbl_attendance.worktime_status_id
        INNER JOIN tbl_status ON tbl_status.status_id = tbl_attendance.status_id
        WHERE 1"; // Start with a generic condition

if (!empty($month)) {
    // Extract month and year from the selected month
    $selected_month = date('m', strtotime($month));
    $selected_year = date('Y', strtotime($month));
    // Compare month and year with the date in the database
    $sql .= " AND MONTH(tbl_attendance.date) = '$selected_month' ";
    $sql .= " AND YEAR(tbl_attendance.date) = '$selected_year' ";
}

if (!empty($usernameFilter)) {
    // Add condition for filtering by username
    $sql .= " AND (tbl_employee_info.firstname LIKE '%$usernameFilter%' OR tbl_employee_info.lastname LIKE '%$usernameFilter%' OR tbl_employee_info.middlename LIKE '%$usernameFilter%')";
}

if (!empty($status)) {
    // Add condition for filtering by status
    $sql .= " AND tbl_status.status_id = '$status'";
}

$result = $conn->query($sql);
?>
<div class="row mt-5 d-flex justify-content-center text-white fw-bold">
    <div class="col-lg-10 mb-3">
        <h2 class='text-white'>Attendance Monitoring</h2>
        <form action="" method="get">
            <div class="row mt-5">
                <div class="col">
                    <label for="">Sort By Month</label>
                    <input class="form-control" type="month" id="month" name="month">

                    <script>
                        // Get the input element
                        const monthInput = document.getElementById('month');

                        // Set the max and min attributes to the current month
                        const today = new Date();
                        const year = today.getFullYear();
                        const month = today.getMonth() + 1; // Months are 0-indexed
                        const formattedMonth = month < 10 ? `0${month}` : month; // Add leading zero if needed
                        const maxDate = `${year}-${formattedMonth}`;

                        monthInput.setAttribute('max', maxDate);
                    </script>
                </div>

                <div class="col">
                    <label for="">Sort By Name</label>
                    <input placeholder="Enter Name" class="form-control" type="text" name="username" value="">
                </div>

                <div class="col">
                    <label for="">Sort By Status</label>
                    <select name="status" class="form-select">
                        <option disabled selected>Select a Section</option>
                        <option value="1">PRESENT</option>
                        <option value="2">LATE</option>
                        <option value="3">ABSENT</option>
                    </select>
                </div>
                <div class="col align-self-end">
                    <button class="btn bg-dark" type="submit"><i class="fa-solid fa-magnifying-glass"
                            style="color:white"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-10 mb-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>TimeIn</th>
                    <th>TimeOut</th>
                    <th>Status</th>
                    <th>Start Shift</th>
                    <th>WorkTime_Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Display table rows based on filtered data
                        ?>
                        <tr>
                            <td></td>
                            <td class="text-capitalize">
                                <?= $row['lastname'] . ' , ' . $row['firstname'] . ' ' . $row['middlename'] ?>
                            </td>
                            <td>
                                <?= date('F j, Y', strtotime($row['date'])) ?>
                            </td>
                            <td>
                                <?= ($row['timeout'] != null) ? date('h:i A', strtotime($row['timein'])) : 'No Data' ?>
                            </td>
                            <td>
                                <?= ($row['timeout'] != null) ? date('h:i A', strtotime($row['timeout'])) : 'No Data' ?>
                            </td>
                            <td>
                                <?= $row['status'] ?>
                            </td>
                            <td>9 AM</td>
                            <td>
                                <?= $row['worktime_status'] ?>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="8" class="text-center">No records found.</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include '../dashboard/footer.php';
?>