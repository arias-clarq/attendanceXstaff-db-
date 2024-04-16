<?php
session_start();
$_SESSION['title'] = 'Monitoring Page';
include '../dashboard/header.php';
include '../dashboard/nav.php';
?>
<div class="row mt-5 d-flex justify-content-center text-white fw-bold">
    <div class="col-lg-10 mb-3">
        <form action="" method="get">
            <div class="row">
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
                        <!-- attendance status here -->
                    </select>
                </div>
                <div class="col align-self-end">
                    <button class="btn bg-dark" type="submit"><i class="fa-solid fa-magnifying-glass" style="color:white"></i></button>
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
                    <th>Workhours</th>
                    <th>Start Shift</th>
                    <th>WorkTime_Status</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<?php
include '../dashboard/footer.php';
?>