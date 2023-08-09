<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:../login.php');
}
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
        width: 20%;
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
    <div class='wrapper'>

        <div class='sidebar' style="position: sticky;">
            <?php
            include '../Component/a_sidebar.php';
            ?>
        </div>
        <?php
        $pendingBookings = array();
        $acceptedBookings = array();
        $completedBookings = array();
        include '../dbconfig.php';

        $bookingQuery1 = "SELECT * FROM booking_test where status='pending'";
        $bookingResult1 = mysqli_query($connect, $bookingQuery1);
        while ($row = mysqli_fetch_assoc($bookingResult1)) {
            $date = date('Y-m-d', strtotime($row['booking_date']));
            if ($date == $today && $row['status'] == 'pending') {
                $pendingBookings[] = $row;
            }
        }
        ?>
        <div class='content'>
            <table>
                <!-- for pending booking-->
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
                        <td>
                            <?php echo $i + 1; ?>
                        </td>
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
                    <?php } ?>
            </table>
            <!-- For accepted -->
            <?php
            $bookingQuery2 = "SELECT * FROM booking_test where status='Accepted'";
            $bookingResult2 = mysqli_query($connect, $bookingQuery2);

            while ($row1 = mysqli_fetch_assoc($bookingResult2)) {
                $date = date('Y-m-d', strtotime($row1['booking_date']));

                $acceptedBookings[] = $row1;
            }
            ?>
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
                <?php foreach ($acceptedBookings as $i => $row1) { ?>
                    <tr>
                        <td>
                            <?php echo $i + 1; ?>
                        </td>
                        <td>
                            <?php echo $row1['b_id']; ?>
                        </td>
                        <td>
                            <?php echo $row1['s_id']; ?>
                        </td>
                        <td>
                            <?php echo $row1['s_name']; ?>
                        </td>
                        <td>
                            <?php echo $row1['booking_date']; ?>
                        </td>
                        <td>
                            <?php echo $row1['t_price']; ?>
                        </td>
                        <td>
                            <?php echo $row1['c_name']; ?>
                        </td>
                        <td>
                            <?php echo $row1['c_adddress']; ?>
                        </td>
                        <td>
                            <?php echo $row1['c_insidevalley']; ?>
                        </td>
                        <td>
                            <?php echo $row1['id']; ?>
                        </td>
                        <td>
                            <?php echo $row1['status']; ?>
                        </td>
                        <td>
                            <?php echo $row1['a_Id']; ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <!--For completed -->
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
                    <th>Agent Id</th>
                </tr>
                <?php
                $bookingQuery2 = "SELECT * FROM booking_test where status='completed'";
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
            <?php
            $bookingQuery3 = "SELECT * FROM booking_test where status='rejected'";
            $bookingResult3 = mysqli_query($connect, $bookingQuery3);

            // while ($row3 = mysqli_fetch_assoc($bookingResult3)) {
            
            //         $acceptedBookings[] = $row3;
            // }
            ?>

            <table>
                <!-- for pending booking-->
                <caption>Rejected Bookings</caption>
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
                <?php while ($row3 = mysqli_fetch_assoc($bookingResult3)) { ?>
                    <tr>
                        <td>
                            <?php echo $i + 1; ?>
                        </td>
                        <td>
                            <?php echo $row3['b_id']; ?>
                        </td>
                        <td>
                            <?php echo $row3['s_id']; ?>
                        </td>
                        <td>
                            <?php echo $row3['s_name']; ?>
                        </td>
                        <td>
                            <?php echo $row3['booking_date']; ?>
                        </td>
                        <td>
                            <?php echo $row3['t_price']; ?>
                        </td>
                        <td>
                            <?php echo $row3['c_name']; ?>
                        </td>
                        <td>
                            <?php echo $row3['c_adddress']; ?>
                        </td>
                        <td>
                            <?php echo $row3['c_insidevalley']; ?>
                        </td>
                        <td>
                            <?php echo $row3['id']; ?>
                        </td>
                        <td>
                            <?php echo $row3['status']; ?>
                        </td>
                    <?php } ?>
            </table>
        </div>



    </div>
</body>

</html>