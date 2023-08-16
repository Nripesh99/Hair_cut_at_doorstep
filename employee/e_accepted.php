<?php
include '../dbconfig.php';
session_start();
include '../session/e_session.php';
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
    table td {
        color: #fff;
        /* Change text color to white */
        background-color: rgba(240, 143, 26, 0.223);
    }

    table caption {
        font-weight: bold;
        margin-bottom: 10px;
    }

    caption {
        text-align: center;
    }

    body {

        background: url('../images/bgimage3.jpg');
        background-size: cover;
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
        <!-- For accepted -->
        <?php
        $bookingQuery2 = "SELECT * FROM booking_test where status='Accepted' AND a_Id=$a_Id";
        $bookingResult2 = mysqli_query($connect, $bookingQuery2);

        while ($row1 = mysqli_fetch_assoc($bookingResult2)) {
            $date = date('Y-m-d', strtotime($row1['booking_date']));
            if ($date == $today && $row1['status'] == 'Accepted') {
                $acceptedBookings[] = $row1;
            }
        }
        ?>
        <div class="content">
            <caption style="color:antiquewhite">Accepted Bookings <h3> in
                    <?php echo $today; ?>
                </h3>
            </caption>
            <table>

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
                        <td>
                            <a class="btn" href="#"
                                onclick="confirmComplete(<?php echo $row1['b_id']; ?>, <?php echo $row1['a_Id']; ?>)">Complete</a>
                        </td>

                        <script>
                            function confirmComplete(bookingId, aId) {
                                if (confirm("Are you sure you want to mark this booking as complete?")) {
                                    window.location.href = "complete.php?id=" + bookingId + "&aId=" + aId;
                                }
                            }
                        </script>


                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>