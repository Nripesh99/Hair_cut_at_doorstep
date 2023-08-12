<?php
// session_start();


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
    <link rel="stylesheet" type="text/css" href="../Css/c_dashboard.css">
    
</head>

<body>
    <section class="container">

        </div>
        <div class="sidebar">
            <?php
            include "../dbconfig.php";
            session_start();
            include "../session/c_session.php";
            include '../Component/c_sidebar.php';
            $a = $_SESSION['email'];
            // echo $a;
            
            $email = $_SESSION['email'];

            $customerQuery = "SELECT Id, Name, Email, Mobile_no, location, Inside_valley FROM customer_register where Email='$email'";
            $customerResult = mysqli_query($connect, $customerQuery);
            $c_row = mysqli_fetch_assoc($customerResult);
            $c_id = $c_row['Id'];


            $pending_booking = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM `booking_test` WHERE id='$c_id' AND status='pending' "));
            $accepted_booking = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM `booking_test` WHERE id='$c_id' AND status='Accepted' "));
            $complete_booking = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM `booking_test` WHERE id='$c_id' AND status='completed' "));
            $reject_booking = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) FROM `booking_test` WHERE id='$c_id' AND status='rejected' "));

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
                        <a href="c_pending.php?c_id=<?php echo $c_row['Id']; ?>">

                            <?php
                            echo '<h3>Pending:<br>  ' . $pending_booking[0] . '</h3>';

                            ?>
                        </a>
                    </center>
                </div>
                <div class="card">
                    <center>
                        <a href="c_accepted.php?c_id=<?php echo $c_row['Id']; ?>">
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
                        <a href="c_completed.php?c_id=<?php echo $c_row['Id']; ?>">
                            <?php
                            echo '<h3>Completed: <br>  ' . $complete_booking[0] . '</h3>';
                            ?>
                        </a>
                    </center>
                </div>
                <div class="card">
                    <center>
                        <a href="c_rejected.php?c_id=<?php echo $c_row['Id']; ?>">
                            <?php
                            echo '<h3>Rejected: <br> ' . $reject_booking[0] . '</h3>';
                            ?>
                        </a>
                    </center>
                </div>
            </div>
        </div>
    </section>
</body>

</html>