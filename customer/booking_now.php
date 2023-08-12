<?php
include "../dbconfig.php";
session_start();
include "../session/c_session.php";
$email = $_SESSION['email'];
echo "$email <br> ";
$s_id = $_GET['id'];
echo "$s_id <br>";
date_default_timezone_set('Asia/Kathmandu');
$currentDateTime = date('Y-m-d H:i:s');
echo $currentDateTime;
// include '../Hair_cut_at_doorstep/book_now.php';
//selecting service from booking
include '../dbconfig.php';
$serviceQuery = "SELECT * FROM services where s_id='$s_id'";
$serviceResult = mysqli_query($connect, $serviceQuery);
$S_row = mysqli_fetch_assoc($serviceResult);
$s_name = $S_row['s_name'];
$s_price = $S_row['s_price'];
//selecting customer data
$customerQuery = "SELECT Id, Name, Email, Mobile_no, location, Inside_valley FROM customer_register where Email='$email'";
$customerResult = mysqli_query($connect, $customerQuery);
$c_row = mysqli_fetch_assoc($customerResult);
$c_id=$c_row['Id'];
$c_name = $c_row['Name'];
$c_address = $c_row['location'];
$c_id = $c_row['Id'];
$c_name = $c_row['Name'];
$isInsideValley = $c_row['Inside_valley'];
//inserting into database booking_test

echo "<br> $s_price";
if ($isInsideValley == 1) {
    $t_price = 50 + $s_price; // Price for locations inside a valley
    echo "<br>$t_price";
} else {
    $t_price = 100 + $s_price;
    echo "<br>$t_price"; // Price for locations outside a valley

}

$booking = "INSERT INTO `booking_test`( `s_id`, `s_name`, `booking_date`, `t_price`, `c_name`, `c_adddress`, `c_insidevalley`, `id`,`a_Id`) 
VALUES ('$s_id','$s_name','$currentDateTime','$t_price','$c_name','$c_address','$isInsideValley','$c_id',null)";
$aa = mysqli_query($connect, $booking);
$redirectUrl = "c_dashboard.php?c_id=".urlencode($c_id);
header("location:$redirectUrl");
 ?>
 