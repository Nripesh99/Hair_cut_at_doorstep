<?php

if (empty($_SESSION['email']) || empty($_SESSION['password']) || $_SESSION['usertype'] !== 'Customer') {
    header("location:../login.php"); // Redirect unauthorized users
    exit();
} else {
    $sql = mysqli_query($connect, "SELECT * FROM customer_register WHERE Email='" . $_SESSION['email'] . "'");
    $result = mysqli_fetch_assoc($sql);

    if (!$result || $_SESSION['password']!=$result['Password']) {
        header("location:../login.php");
        exit();
    }
    
}
?>
