<?php
// session_start();
$a=$_SESSION['email'];
// echo $a;
include '../dbconfig.php';
$email = $_SESSION['email'];

$customerQuery = "SELECT Id, Name, Email, Mobile_no, location, Inside_valley FROM customer_register where Email='$email'";
$customerResult = mysqli_query($connect, $customerQuery);
$c_row = mysqli_fetch_assoc($customerResult);
$c_id=$c_row['Id'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="../Css/c_sidebar.css" />
</head>

<body>
  <section class="container">
    <div class="sidebar">
      <header>
        <h2>Customer Panel</h2>
      </header>
      <aside>
        <a href="c_dashboard.php">Dashboard</a>
        <a href="C_pending.php?c_id=<?php echo $c_row['Id'];?>">Pending</a>
        <a href="c_accepted.php?c_id=<?php echo $c_row['Id'];?>">Accepted</a>
        <a href="c_completed.php?c_id=<?php echo $c_row['Id'];?>">Completed</a>
        <a href="c_rejected.php?c_id=<?php echo $c_row['Id'];?>">Rejected</a>
        <a href="homepage.php#home">Home</a>
        
        <a href="../logout.php">Logout</a>
      </aside>
    </div>
  </section>
</body>

</html>