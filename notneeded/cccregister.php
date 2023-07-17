<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form method="post" action="cregister.php">
            <label for="name">Name:</label>
  <input type="text" id="name" name="name" required><br><br>
  
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required><br><br>

  <label for="mobile_no">Mobile number:</label>
  <input type="tel" id="Mobile_no" name="Mobile_no" required><br><br>
  
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required><br><br>
  
  <label for="location">Location:</label>
  <input type="text" id="location" name="location" required><br><br>
  
  <label for="booleanValue">Are you located inside ring road (yes or no)</label>
  <input type="checkbox" id="ring_road" name="ring_road"><br><br>
  
  <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
<?php
include "dbconfig.php";
if(isset($_POST['submit'])){

$name = $_POST['name'];
$email = $_POST['email'];
$mobile_no=$_POST['Mobile_no'];
$password = $_POST['password'];
$location = $_POST['location'];
$booleanValue = isset($_POST['ring_road']) ? 1 : 0;


$sql ="INSERT INTO customer_register (Name, Email, Mobile_no, Password, Location, Inside_valley) VALUES('$name', '$email', '$mobile_no', '$password', '$location', '$booleanValue')";
$aa=mysqli_query($connect, $sql);
if($aa){
    //  header("Location:login.php");

    echo "Succesfully register";
    exit();
}
else{
    echo "registeration failed !";
}

}


?>