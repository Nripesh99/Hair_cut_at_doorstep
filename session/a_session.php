<?php
if (empty($_SESSION['email']) || empty($_SESSION['password']) || $_SESSION['usertype'] !== 'Admin') {
    header("location: ../login.php"); // Redirect unauthorized users
    exit();
} else {
    $sql = mysqli_query($connect, "SELECT * FROM admin_register WHERE Email='" . $_SESSION['email'] . "'");
    $result = mysqli_fetch_assoc($sql);

    if (!$result || $_SESSION['password'] != $result['password']) {
        header("location: ../login.php");
        exit();
    }
}
?>
