<?php
if (empty($_SESSION['email']) || empty($_SESSION['password']) || $_SESSION['usertype'] !== 'Employee') {
    header("location: ../login.php"); // Redirect unauthorized users
    exit();
} else {
    $sql = mysqli_query($connect, "SELECT * FROM agent_register WHERE Email='" . $_SESSION['email'] . "'");
    $result = mysqli_fetch_assoc($sql);

    if (!$result || $_SESSION['password'] != $result['password']) {
        header("location: ../login.php");
        exit();
    }
}
?>
