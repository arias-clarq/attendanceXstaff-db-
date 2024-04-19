<?php
session_start();
$_SESSION['title'] = 'Client Page';
include '../dashboard/header.php';
include '../../config/dbcon.php';
?>
<?php
include '../dashboard/nav.php';
?>

<?php
include '../dashboard/footer.php';
?>