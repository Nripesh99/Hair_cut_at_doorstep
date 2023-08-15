<?php
include '../dbconfig.php';
session_start();
include '../session/a_session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/cregister.css">
</head>
<style>
    img {
        width: 150px;
        height: auto;
    }
</style>

<body class="container">
    <div class="logo">
        <image src="../images/logo1234.png"></image><br><br>
    </div>
    <p>Add services</p>
    <div>
        <form class="form" method="post" action="add_service.php" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required><br><br>

            <label for="Time">Time:</label>
            <input type="number" id="time" name="time" required><br><br>

            <label for="file">Upload file:</label>
            <input type="file" id="file" name="file" required><br><br>

            <!-- <button class="submit" type="submit" name="submit">Submit</button> -->
            <div class="submit">
                <input type="submit" name="Register" value="register"></input>
            </div>
        </form>
    </div>
    <button onclick="goBack()">Go Back</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
<?php

if (isset($_POST['Register'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $time = $_POST['time'];
    //for file
    $image_link = $_FILES['file'];
    $file_upload_path = 'upload/';
    $file_name = $image_link['name'];
    $file_temp = $image_link['tmp_name'];

    $file = $file_upload_path . $file_name;
    if (move_uploaded_file($file_temp, $file)) {
        echo "file uploaded";

    } else {
        echo "unable to upload file";
    }


    $sql = "INSERT INTO services(s_name, s_price, s_time, s_image) VALUES('$name', '$price', '$time','$file' )";
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