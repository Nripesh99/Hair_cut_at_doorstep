<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["password"]);
unset($_SESSION["usertype"]);

//removing cookies
$expiration_time = time() - 3600 * 24 * 30;
setcookie('email', $email, $expiration_time);
setcookie('password', $password, $expiration_time);
setcookie('usertype', $usertype, $expiration_time);
header("Location:login.php");

?>