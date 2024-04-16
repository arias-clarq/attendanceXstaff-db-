<?php
    session_start();
    $_SESSION['title'] = 'Admin Page';
    include '../dashboard/header.php';
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
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric'};
        var formattedTime = now.toLocaleDateString('en-US', options);
        systemTimeElement.textContent = 'System Time: ' + formattedTime;
    }

    // Update system time every second
    setInterval(updateSystemTime, 1000);

    // Initial call to update system time
    updateSystemTime();
</script>

<div class="row row-cols-4 m-5">
    <!-- Card 1: Users -->
    <div class="col">
        <div class="card bg-dark text-white">
            <div class="card-body">
                <h5 class="card-title">Users</h5>
                <p class="card-text">Total Staff: </p>
                <p class="card-text">Total Admin: </p>
                <p class="card-text">Total Client: </p>
                <a href="users_mgt.php" class="btn btn-primary">View Details</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card bg-dark text-white">
            <div class="card-body">
                <h5 class="card-title">Attendance</h5>
                <p class="card-text">lorem ipsum</p>
                <p class="card-text">lorem ipsum</p>
                <p class="card-text">lorem ipsum</p>
                <a href="attendance.php" class="btn btn-primary">View Details</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card bg-dark text-white">
            <div class="card-body">
                <h5 class="card-title">Attendance</h5>
                <p class="card-text">lorem ipsum</p>
                <p class="card-text">lorem ipsum</p>
                <p class="card-text">lorem ipsum</p>
                <a href="attendance_monitoring.php" class="btn btn-primary">View Details</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card bg-dark text-white">
            <div class="card-body">
                <h5 class="card-title">Attendance</h5>
                <p class="card-text">lorem ipsum</p>
                <p class="card-text">lorem ipsum</p>
                <p class="card-text">lorem ipsum</p>
                <a href="attendance_monitoring.php" class="btn btn-primary">View Details</a>
            </div>
        </div>
    </div>
</div>
<?php 
    include '../dashboard/footer.php';
?>