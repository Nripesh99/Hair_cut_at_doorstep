<?php
include "../dbconfig.php";
$id = $_GET['id'];
$bookingCheckSql = "SELECT COUNT(*) AS booking_count FROM booking_test WHERE s_id = $id";
$bookingCheckResult = mysqli_query($connect, $bookingCheckSql);
$bookingCountRow = mysqli_fetch_assoc($bookingCheckResult);
$bookingCount = $bookingCountRow['booking_count'];

if ($bookingCount > 0) {
    echo "<h1>Cannot delete the service because there are active bookings.</h1>";
    echo '<a href="a_service.php">Go back to Service</a>';
} else {
    $sql = "DELETE  FROM services WHERE s_id = $id";
    $result = mysqli_query($connect, $sql);
    echo "data deleted succesfully";
    header('location:../admin/a_service.php');
}

?>