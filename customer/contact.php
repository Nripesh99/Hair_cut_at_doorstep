<?php
session_start();
include 'dbconfig.php';
include '../session/c_session.php';
if (isset($_POST['contact'])) {

    $name = $_POST['Name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $sql = "INSERT INTO feedback ( Name, email, Subject, message) 
    VALUES('$name', '$email', '$subject', '$message')";
    $aa = mysqli_query($connect, $sql);
    if ($aa) {

        echo "WE would contact you soon";
        
        exit();
    } else {
        echo "registeration failed !";
        exit();
    }
}

?>