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
// echo $a_Id;
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

    body {
        background: url('../images/bgimage3.jpg');
        background-size: cover;
    }
</style>

<body>


    <div class="wrapper">
        <div class="sidebar" style="position: sticky;">
            <?php include '../Component/e_sidebar.php'; ?>
        </div>
        <?php
        $pendingBookings = array();
        $acceptedBookings = array();
        $completedBookings = array();

        $bookingQuery1 = "SELECT * FROM booking_test where status='pending'";
        $bookingResult1 = mysqli_query($connect, $bookingQuery1);
        while ($row = mysqli_fetch_assoc($bookingResult1)) {
            $date = date('Y-m-d', strtotime($row['booking_date']));
            if ($date == $today && $row['status'] == 'pending') {
                $pendingBookings[] = $row;
            }
        }
        ?>
        <div class="content">
            <table>
                <!-- for pending booking-->
                <caption>
                    <h3> Customer booking in
                        <?php echo $today; ?>
                    </h3>
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
                    <th colspan="2">Action</th>
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
                        <td>
                            <a class="btn" href="javascript:void(0);"
                                onclick="confirmAccept(<?php echo $row['b_id']; ?>, <?php echo $a_row['a_Id']; ?>)">Accept</a>
                        </td>

                        <script>
                            function confirmAccept(bId, aId) {
                                if (confirm("Are you sure you want to accept this booking?")) {
                                    window.location.href = "accept.php?id=" + bId + "&aId=" + aId;
                                }
                            }
                        </script>
                        <td><a class='btn'
                                href="totalview.php?c_id=<?php echo $row['id']; ?>&b_id=<?php echo $row['b_id']; ?>&s_id=<?php echo $row['s_id']; ?>">View</a>
                        </td>

                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>