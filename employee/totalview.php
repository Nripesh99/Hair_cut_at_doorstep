<?php
include '../dbconfig.php';
session_start();
include '../session/e_session.php';
$customer_id=$_GET['c_id'];
$booking_id=$_GET['b_id'];
$service_id=$_GET['s_id'];
$agentQuery = "SELECT * FROM customer_register where id=$customer_id";
$agentResult = mysqli_query($connect, $agentQuery);
$row=mysqli_fetch_assoc($agentResult);
$serviceQuery = "SELECT * FROM services";
$serviceResult = mysqli_query($connect, $serviceQuery);
$row2=mysqli_fetch_assoc($serviceResult);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .content{
        display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-top: 50px;
    }
    </style>
<body class='content'>
    <h1>Customer Details</h1>
    Customer Name=<?php echo $row['Name'] ?><br>
    Customer Address=<?php echo $row['location'] ?><br>
    Customer Phone no=<?php  echo $row['Mobile_no']?><br>
    <h1>Service detail</h1>
    Service Name=<?php echo $row2['s_name'] ?><br>
    Service Price=<?php echo $row2['s_price'] ?><br>
    Time =<?php  echo $row2['s_time']?>min<br><br><br>
    <button onclick="goBack()">Go Back</button>

<script>
  function goBack() {
    window.history.back();
  }
</script>
</body>
</html>