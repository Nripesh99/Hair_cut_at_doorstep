
<?php
session_start();
include '../dbconfig.php';
 
include '../session/a_session.php';

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

