<?php
include '../dbconfig.php';
session_start();
// if (!isset($_SESSION['email']) && $_SESSION['usertype']== 'Admin' )  {
//     header('location:../login.php');
// }
if (!isset($_SESSION['email'])) {
    header('location:../login.php');
}

// Retrieve data from the customer table
$customerQuery = "SELECT * FROM customer_register";
$customerResult = mysqli_query($connect, $customerQuery);

// Retrieve data from the agent table
$agentQuery = "SELECT * FROM agent_register";
$agentResult = mysqli_query($connect, $agentQuery);

//Receiving data from services table
$serviceQuery = "SELECT * FROM services";
$serviceResult = mysqli_query($connect, $serviceQuery);
// Retrieve data from the booking table
$bookingQuery = "SELECT * FROM booking_test";
$bookingResult = mysqli_query($connect, $bookingQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="indexadmin.css">
</head>

<body>
    <h1>Welcome to the Admin Page</h1>
    <a href="../logout.php">logout</a>
    <!--    -->
    <h2>Customer Table</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Location</th>
            <th>Inside Valley</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($customerResult)) { ?>
            <tr>
                <td>
                    <?php echo $row['Id']; ?>
                </td>
                <td>
                    <?php echo $row['Name']; ?>
                </td>
                <td>
                    <?php echo $row['Email']; ?>
                </td>
                <td>
                    <?php echo $row['Mobile_no']; ?>
                </td>
                <td>
                    <?php echo $row['Password']; ?>
                </td>
                <td>
                    <?php echo $row['location']; ?>
                </td>
                <td>
                    <?php echo $row['Inside_valley']; ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <!-- Agent table starts -->
    <h2>Agent Table</h2>
    <h2>TO add the agent </h2><a href="add_agent.php">add_agent </a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($agentResult)) { ?>
            <tr>
                <td>
                    <?php echo $row['a_Id']; ?>
                </td>
                <td>
                    <?php echo $row['Name']; ?>
                </td>
                <td>
                    <?php echo $row['Email']; ?>
                </td>
                <td>
                    <?php echo $row['Mobile_no']; ?>
                </td>
                <td><a href="edit_agent.php?id=<?php echo $row['a_Id']; ?>">Edit</a></td>
                <!-- <td><a href="view.php?id=<?php echo $row['a_Id']; ?>">View</a></td> -->
                <td><a href="delete_agent.php?id=<?php echo $row['a_Id']; ?>">Delete</a></td>

            </tr>
        <?php } ?>
    </table>
    <!-- Service table -->
    <h2>Service Table</h2>
    <a href="add_service.php">add_service </a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>time_in_min</th>

        </tr>
        <?php while ($row = mysqli_fetch_assoc($serviceResult)) { ?>
            <tr>
                <td>
                    <?php echo $row['s_id']; ?>
                </td>
                <td>
                    <?php echo $row['s_name']; ?>
                </td>
                <td>
                    <?php echo $row['s_price']; ?>
                </td>
                <td>
                    <?php echo $row['s_time']; ?>
                </td>
                <td><a href="edit_service.php?id=<?php echo $row['s_id']; ?>">Edit</a></td>
                <td><a href="delete_service.php?id=<?php echo $row['s_id']; ?>">Delete</a></td>
            </tr>
        <?php } ?>

    </table>
    <h2>Booking Table</h2>
    <table>
        <tr>
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
        <?php while ($row = mysqli_fetch_assoc($bookingResult)) { ?>
            <tr>
                <td>
                    <?php echo $row['b_id']; ?>
                </td>
                <td>
                    <?php echo $row['s_id']; ?>
                </td>
                <td>
                    <?php echo $row['s_name']; ?>
                </td>
                <td>
                    <?php echo $row['booking_date']; ?>
                </td>
                <td>
                    <?php echo $row['t_price']; ?>
                </td>
                <td>
                    <?php echo $row['c_name']; ?>
                </td>
                <td>
                    <?php echo $row['c_adddress']; ?>
                </td>
                <td>
                    <?php echo $row['c_insidevalley']; ?>
                </td>
                <td>
                    <?php echo $row['id']; ?>
                </td>
                <td>
                    <?php echo $row['status']; ?>
                </td>

            </tr>
        <?php } ?>
    </table>

    <?php
   //CHanging status from pending to rejected if the booking date and todays date is not same
    
    
    // Get today's date
    $today = date('Y-m-d');

    // Query to retrieve bookings
    $sql = "SELECT * FROM booking_test";
    $result = mysqli_query($connect, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $bookingId = $row['b_id'];
            $date = date('Y-m-d', strtotime($row['booking_date']));
            $status = $row['status'];

            // Check if booking date is not equal to today's date
            if ($date != $today && $status == 'pending') {
                // Update the status to "rejected"
                $updateSql = "UPDATE booking_test SET status = 'rejected' WHERE b_id = $bookingId";
                $updateResult = mysqli_query($connect, $updateSql);

                if ($updateResult) {
                    echo "";
                } else {
                    echo "Error updating status for Booking ID: $bookingId.<br>";
                }
            }
        }
    } else {
        echo "No bookings found.";
    }
    ?>


</body>

</html>