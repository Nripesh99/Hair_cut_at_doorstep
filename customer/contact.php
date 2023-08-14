<?php
session_start();
include '../dbconfig.php';
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

        echo 
        '<script>
            alert("WE will contact you soon");
        </script>';
        
        
        echo '<script>
            location.assign("homepage.php#contact");
        </script>';
    } else {
        echo '<script>
        alert(""registeration failed !";
        ");
                </script>';
                echo '<script>
                location.assign("homepage.php#contact");
            </script>';
        exit();
    }
}

?>