<?php include '../dbconfig.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="hair_cut_at_doorstep/Css/aregister.css">
</head>

<body class="container">
    <div class="logo">
        <image src="logo.png"></image><br><br>
    </div>
    <p>Regsister As Customer</p>
    <div>
        <form class="form" method="post" action="add_agent.php">
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



            <!-- <button class="submit" type="submit" name="submit">Submit</button> -->
            <div class="submit">
                <input type="submit" name="Register" value="register"></input>
            </div>
        </form>
    </div>
</body>

</html>
<?php

if (isset($_POST['Register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile_no = $_POST['Mobile_no'];
    $password = $_POST['password'];
    $location = $_POST['location'];
   
     echo "HEllo";

    $sql = "INSERT INTO agent_register (Name, Email, Mobile_no, Password, Location) VALUES('$name', '$email', '$mobile_no', '$password', '$location')";
    $aa = mysqli_query($connect, $sql);
    if ($aa) {
        //  header("Location:login.php");

        echo "Succesfully register";
        header('location:../admin/index.php');
        exit();
        
    } else {
        echo "registeration failed !";
    }
}


?>