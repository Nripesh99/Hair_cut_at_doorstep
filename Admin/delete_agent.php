<?php
include "../dbconfig.php";
$id = $_GET['id'];
$bookingCheckSql = "SELECT COUNT(*) AS booking_count FROM booking_test WHERE a_id = $id";
$bookingCheckResult = mysqli_query($connect, $bookingCheckSql);
$bookingCountRow = mysqli_fetch_assoc($bookingCheckResult);
$bookingCount = $bookingCountRow['booking_count'];

if ($bookingCount > 0) {
    echo "Cannot delete the agent because there are active bookings.";
    echo '<a href="a_agent.php">Go back to Service</a>';
}
else{
$sql = "DELETE  FROM agent_register WHERE a_Id = $id";
$result = mysqli_query($connect, $sql);
echo "data deleted succesfully";
header('location:../admin/index.php');
}
?>