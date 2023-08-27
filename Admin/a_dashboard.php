
<?php
session_start();
include '../dbconfig.php';
include '../session/a_session.php';

?>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../Css/a_dashboard.css">
</head>

<body>
    <section class="container">
        <div class="sidebar">
            <?php
            include '../Component/a_sidebar.php';
            $a = $_SESSION['email'];
            // echo $a;
            include '../dbconfig.php';


            $booking = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM `booking_test` "));
            $service = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM `services`  "));
            $customer = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM `customer_register`"));
            $reject_booking = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM `booking_test`  "));
            $agent = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM `agent_register` "));
            $feedback= mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM `feedback` "));
            ?>
        </div>
        <div class="main">
            <div class="top">
                <center>
                    <h1>DASHBOARD</h1>
                </center>
            </div>
            <div class="middle">
                <div class="card">
                    <center>
                        <a href="a_booking.php ">

                            <?php
                            echo '<h3>Total Booking:<br>  ' . $booking[0] . '</h3>';

                            ?>
                        </a>
                    </center>
                </div>
                <div class="card">
                    <center>
                        <a href="a_service.php ">
                            <?php
                            echo '<h3>Service : <br> ' . $service[0] . '</h3>';
                            ?>
                        </a>
                    </center>
                </div>
                <div class="card">
                    <center>
                        <a href="a_customer.php ">
                            <?php
                            echo '<h3>Customer: <br> ' . $customer[0] . '</h3>';
                            ?>
                        </a>
                    </center>
                </div>
            </div>
            <div class="bottom">
                <div class="card">
                    <center>
                        <a href="a_agent.php ">
                            <?php
                            echo '<h3>Agent: <br>  ' . $agent[0] . '</h3>';
                            ?>
                        </a>
                    </center>
                </div>
                <div class="card">
                    <center>
                        <a href="a_feedback.php">
                            <?php
                            echo '<h3>Feedback: <br> ' . $feedback[0] . '</h3>';
                            ?>
                        </a>
                    </center>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

