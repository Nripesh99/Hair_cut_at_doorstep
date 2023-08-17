<?php
include '../dbconfig.php';
session_start();
include '../session/e_session.php';
$email = $_SESSION['email'];

$agentQuery = "SELECT a_Id, Name, Email, Mobile_no, location FROM agent_register where Email='$email'";
$agentResult = mysqli_query($connect, $agentQuery);
$a_row = mysqli_fetch_assoc($agentResult);
$a_id = $a_row['a_Id'];


$pending_booking = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM `booking_test` WHERE  status='pending' "));
$accepted_booking = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM `booking_test` WHERE a_Id='$a_id' AND status='Accepted' "));
$complete_booking = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM `booking_test` WHERE a_Id='$a_id' AND status='completed' "));



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
    <link rel="stylesheet" type="text/css" href="../Css/e_dashboard.css">
</head>
<style>
    body {
        background: url('../images/bgimage3.jpg');
        background-size: cover;
    }
</style>

<body>
    <section class="container">
        <div class="sidebar">
            <?php
            include '../Component/e_sidebar.php';
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
                        <a href="e_pending.php?a_id=<?php echo $a_row['a_Id']; ?>">

                            <?php
                            echo '<h3>Pending:<br>  ' . $pending_booking[0] . '</h3>';

                            ?>
                        </a>
                    </center>
                </div>
                <div class="card">
                    <center>
                        <a href="e_accepted.php?a_id=<?php echo $a_row['a_Id']; ?>">
                            <?php
                            echo '<h3>Accepted_booking: <br> ' . $accepted_booking[0] . '</h3>';
                            ?>
                        </a>
                    </center>
                </div>
            </div>
            <div class="bottom">
                <div class="card">
                    <center>
                        <a href="e_completed.php?a_id=<?php echo $a_row['a_Id']; ?>">
                            <?php
                            echo '<h3>Completed: <br>  ' . $complete_booking[0] . '</h3>';
                            ?>
                        </a>
                    </center>
                </div>
                <div class="card">
                    <center>
                        <a href="e_changepassword.php?a_id=<?php echo $a_row['a_Id']; ?>">
                        <h3>Change Password</h3>
                        </a>
                    </center>
                </div>
            </div>
        </div>
    </section>
</body>

</html>