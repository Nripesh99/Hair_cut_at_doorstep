<?php
session_start();  
if (!isset($_SESSION['email'])) {
    header('location:../login.php');
}  
include '../dbconfig.php';
$today = date("Y-m-d");
$email= $_SESSION['email'];
// selecting data from booking_test
$bookingQuery = "SELECT * FROM booking_test";
$bookingResult = mysqli_query($connect, $bookingQuery);


$agentQuery ="SELECT * FROM agent_register where Email= '$email'";
$agentResult =mysqli_query($connect, $agentQuery);
$a_row=mysqli_fetch_assoc($agentResult);
$a_Id=$a_row['a_Id'];
echo $a_Id;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
z
<body>
    <h3> Customer booking in <?php echo $today; ?></h3>
    <?php
// Separate bookings based on status
$pendingBookings = array();
$acceptedBookings = array();
$completedBookings = array();

while ($row = mysqli_fetch_assoc($bookingResult)) {
    $date = date('Y-m-d', strtotime($row['booking_date']));

    if ($date == $today) {
        if ($row['status'] == 'pending') {
            $pendingBookings[] = $row;
        } elseif ($row['status'] == 'Accepted') {
            $acceptedBookings[] = $row;
        } elseif ($row['status'] == 'completed') {
            $completedBookings[] = $row;
        }
    }
}
?>

<!-- Pending Bookings Table -->
<table>
    <caption>Pending Bookings</caption>
    <tr>
        <th>S.no</th>
        <th>Booking ID</th>
        <th>Service ID</th>
        <th>Service Name</th>
        <th>Booking date and time</th>
        <th>Total price</th>
        <th>Customer name</th>
        <th>Customer address</th>
        <th>Inside valley</th>
        <th>Customer ID</th>
        <th>Status</th>
    </tr>
    <?php foreach ($pendingBookings as $i => $row) { ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo $row['b_id']; ?></td>
            <td><?php echo $row['s_id']; ?></td>
            <td><?php echo $row['s_name']; ?></td>
            <td><?php echo $row['booking_date']; ?></td>
            <td><?php echo $row['t_price']; ?></td>
            <td><?php echo $row['c_name']; ?></td>
            <td><?php echo $row['c_adddress']; ?></td>
            <td><?php echo $row['c_insidevalley']; ?></td>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><a  class='btn' href="accept.php?id=<?php echo $row['b_id']; ?>&aId=<?php echo $a_row['a_Id']; ?>">Accept</a></td>
        </tr>
    <?php } ?>
</table>

<!-- Accepted Bookings Table -->
<table>
    <caption>Accepted Bookings</caption>
    <tr>
        <th>S.no</th>
        <th>Booking ID</th>
        <th>Service ID</th>
        <th>Service Name</th>
        <th>Booking date and time</th>
        <th>Total price</th>
        <th>Customer name</th>
        <th>Customer address</th>
        <th>Inside valley</th>
        <th>Customer ID</th>
        <th>Status</th>
    </tr>
    <?php foreach ($acceptedBookings as $i => $row) { ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo $row['b_id']; ?></td>
            <td><?php echo $row['s_id']; ?></td>
            <td><?php echo $row['s_name']; ?></td>
            <td><?php echo $row['booking_date']; ?></td>
            <td><?php echo $row['t_price']; ?></td>
            <td><?php echo $row['c_name']; ?></td>
            <td><?php echo $row['c_adddress']; ?></td>
            <td><?php echo $row['c_insidevalley']; ?></td>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><a  class='btn' href="complete.php?id=<?php echo $row['b_id']; ?>&aId=<?php echo $a_row['a_Id']; ?>">Complete</a></td>
        </tr>
    <?php } ?>
</table>

<!-- completed Bookings Table -->
<table>
    <caption>completed Bookings</caption>
    <tr>
        <th>S.no</th>
        <th>Booking ID</th>
        <th>Service ID</th>
        <th>Service Name</th>
        <th>Booking date and time</th>
        <th>Total price</th>
        <th>Customer name</th>
        <th>Customer address</th>
        <th>Inside valley</th>
        <th>Customer ID</th>
        <th>Status</th>
    </tr>
    <?php foreach ($completedBookings as $i => $row) { ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo $row['b_id']; ?></td>
            <td><?php echo $row['s_id']; ?></td>
            <td><?php echo $row['s_name']; ?></td>
            <td><?php echo $row['booking_date']; ?></td>
            <td><?php echo $row['t_price']; ?></td>
            <td><?php echo $row['c_name']; ?></td>
            <td><?php echo $row['c_adddress']; ?></td>
            <td><?php echo $row['c_insidevalley']; ?></td>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['a_Id']; ?></td>
        </tr>
    <?php } ?>
</table>

   


<a href="../logout.php">logout</a>
</body>

</html>