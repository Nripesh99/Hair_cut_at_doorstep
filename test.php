<?php 
include "dbconfig.php";
if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['phone'];
$pass = $_POST['password'];
$location = $_POST['location'];
$booleanValue = isset($_POST['ring_road']) ? 1 : 0;


$sql ="INSERT INTO customer_register (Name, Email, Mobile_no, Password, Location, Inside_valley) 
VALUES('$name', '$email', '$tel', '$pass', '$location', '$booleanValue')";
$response=mysqli_query($connect, $sql);
if($response){
    echo "Register Login ";
    header("locataion:login.php");
}
else{
    echo "Something went wrong please try again";
   
}
}
else{
    echo "Enter the values";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="test.php" method="post">

        <label for="Name">Name: </label><br>
        <input type="text" name="name" id=""><br>
        <label for="Email">Email: </label><br>
        <input type="email" name="email" id=""><br>
        <label for="Phone">Phone: </label><br>
        <input type="tel" name="phone" id=""><br>
        <label for="password">Password: </label><br>
        <input type="password" name="password" id=""><br>
        <label for="location">Location: </label><br>
        <input type="text" name="location" id=""><br>
        <input type="checkbox" name="road" id=""> <p>Are you location inside ring road</p>
        <input type="submit" value="Register" name="submit">
    </form>
</body>
</html>