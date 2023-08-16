<?php
include '../dbconfig.php';
$id=$_GET['id'];
echo"<br> $id<br>";
$a_id=$_GET['aId'];
echo "$a_id <br>";
echo 'Hello';
$status='completed';
$booking = "UPDATE  `booking_test` SET  status='completed', a_Id='$a_id' WHERE b_id='$id'";
$aa = mysqli_query($connect, $booking);
header('location:../employee/index.php');

?>