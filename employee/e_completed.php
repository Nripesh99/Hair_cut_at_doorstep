<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:../login.php');
}
include '../dbconfig.php';
// include '../Component/e_sidebar.php';
$today = date("Y-m-d");
$email = $_SESSION['email'];
// selecting data from booking_test


$agentQuery = "SELECT * FROM agent_register where Email= '$email'";
$agentResult = mysqli_query($connect, $agentQuery);
$a_row = mysqli_fetch_assoc($agentResult);
$a_Id = $a_row['a_Id'];
$bookingQuery = "SELECT * FROM booking_test";
$bookingResult = mysqli_query($connect, $bookingQuery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<style>
    .wrapper {
        display: flex;
    }

    .sidebar {
        width: 0%;
        background-color: #f1f1f1;
        padding: 0px;
    }

    .content {
        width: 80%;
        padding: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    table caption {
        font-weight: bold;
        margin-bottom: 10px;
    }
</style>


<body>
    <div class="wrapper">
        <div class="sidebar">
            <?php include '../Component/e_sidebar.php'; ?>
        </div>
        <?php
        $pendingBookings = array();
        $acceptedBookings = array();
        $completedBookings = array();
        ?>
        <div class="content">
            <!--For completed -->
            <table>
                <caption>completed Bookings of  customer<h2> 
                    </h2>
                </caption>
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
                    <th>Agent Id</th>
                </tr>
                <?php
                $bookingQuery2 = "SELECT * FROM booking_test where status='completed' AND a_Id=$a_Id ";
                $bookingResult2 = mysqli_query($connect, $bookingQuery2);
                $i = 1;
                while ($row2 = mysqli_fetch_assoc($bookingResult2)) {
                    $date = date('Y-m-d', strtotime($row2['booking_date']));
                    // if($date==$today && $row2['status'] == 'completed'){
                    //     $acceptedBookings[] = $row2;
                    // }
                
                    ?>

                    <tr>
                        <td>
                            <?php echo $i; ?>
                        </td>
                        <td>
                            <?php echo $row2['b_id']; ?>
                        </td>
                        <td>
                            <?php echo $row2['s_id']; ?>
                        </td>
                        <td>
                            <?php echo $row2['s_name']; ?>
                        </td>
                        <td>
                            <?php echo $row2['booking_date']; ?>
                        </td>
                        <td>
                            <?php echo $row2['t_price']; ?>
                        </td>
                        <td>
                            <?php echo $row2['c_name']; ?>
                        </td>
                        <td>
                            <?php echo $row2['c_adddress']; ?>
                        </td>
                        <td>
                            <?php echo $row2['c_insidevalley']; ?>
                        </td>
                        <td>
                            <?php echo $row2['id']; ?>
                        </td>
                        <td>
                            <?php echo $row2['status']; ?>
                        </td>
                        <td>
                            <?php echo $row2['a_Id']; ?>
                        </td>
                    </tr>
                    <?php
                    $i++;
                } ?>
            </table>
        </div>
    </div>
</body>

</html>