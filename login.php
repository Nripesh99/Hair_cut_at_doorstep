<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../hair_cut_at_doorstep/Css/login.css">
    <title class="title">Login Page</title>



</head>


<body class="container">

    <image class="logo" src="images\logo123.png"></image><br><br>

    <div>Sign into your account</div>
    <form class="form" method="POST" onsubmit="return validatePassword()">
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" placeholder="Enter email" required><br>
        <label for="Password">Password</label><br>
        <input type="password" name="password" id="password" placeholder="password" required><br>
        <span id="message" style="color:red"> </span> <br><br>

        <label for="User_type">Choose User type:</label>
        <select name="User_type" id="User_type">
            <option value="Customer">Customer</option>
            <option value="Agent">Agent</option>
            <option value="Admin">Admin</option>
        </select>
        <br>

        <input type="submit" name="login" value="login"></input><br><br>

        <!-- <label for="remember_me">Remember Me</label>
        <input type="checkbox" id="remember_me" name="remember_me"> -->
        <br>
        <div class="registration">
            Don't have an Account? <a href="cregister.php">
                Register
            </a>

        </div>

    </form>

</body>

</html>

<?php
session_start();
error_reporting(E_ERROR); // Display only errors, suppress warnings and notices

if (isset($_SESSION['email']) && ($_SESSION['usertype'] == 'Customer')) {
    header('location:customer\homepage.php');
} else if (isset($_SESSION['email']) && ($_SESSION['usertype'] == 'Admin')) {
    header('location:Admin\a_dashboard.php');
} else if (isset($_SESSION['email']) && ($_SESSION['usertype'] == 'Agent')) {
    header('location:employee\e_dashboard.php');
}
?>
<?php
require 'dbconfig.php';

if (isset($_COOKIE['email'])) {
    // session_start();
    $_SESSION['email'] = $_COOKIE['email'];
    header('location:customer\homepage.php');
}


if (isset($_POST['login'])) {
    $process = true;
    if ($process) {
        //create new array to store error

        $err = [];
        //checks whether the enter email is empty and whether or not the form have been submitted
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = $_POST['email'];
        } else {
            $err['email'] = "Enter email";
        }
        if (isset($_POST['password']) && !empty($_POST['password'])) {
            $password = $_POST['password'];
        } else {
            $err['password'] = "Enter password";
        }
        if (isset($_POST['User_type']) && !empty($_POST['User_type'])) {
            $usertype = $_POST['User_type'];
        } else {
            $err['User_type'] = "Enter Usertype";
        }

        //checking number of process it takes to login
        if (count($err) == 0) {


            if ($usertype == 'Customer') {
                $sql = "SELECT * FROM customer_register where email='$email'  limit 1";
                $aa = mysqli_query($connect, $sql);
                $row = mysqli_fetch_array($aa);
                if (password_verify($password, $row['Password'])) {
                    $user = $aa->fetch_assoc();
                    // session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $row['Password'];
                    $_SESSION['usertype'] = $usertype;


                    if ($_POST['remember_me'] == 1 || $_POST['remember_me'] == 'on') {
                        $hour = time() + 3600 * 24 * 30;
                        setcookie('email', $email, $hour);
                        setcookie('password', $row['Password'], $hour);
                        setcookie('usertype', $usertype, $hour);
                    }

                    //Redirect to new page
                    echo "Login succesfully";
                    // echo $_SESSION['usertype'];
                    header("location:customer/homepage.php");
                    exit();
                } else {
                    echo "Login failed";
                }
            }
            //user type admin 
            else if ($usertype == 'Admin') {
                include 'dbconfig.php';
                $sql = "SELECT * FROM admin_register where email='$email' limit 1";
                $aa = mysqli_query($connect, $sql);
                $row = mysqli_fetch_array($aa);
                if (password_verify($password, $row['password'])) {
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['usertype'] = $usertype;
                    header('location:../../hair_cut_at_doorstep/admin/a_dashboard.php');
                    echo ("login success");

                    if ($_POST['remember_me'] == 1 || $_POST['remember_me'] == 'on') {
                        $hour = time() + 3600 * 24 * 30;
                        setcookie('email', $email, $hour);
                        setcookie('password', $row['Password'], $hour);
                        setcookie('usertype', $usertype, $hour);
                    }

                } else {
                    echo "login fail";
                }
            }
            //user type  agent
            elseif ($usertype == 'Agent') {
                include 'dbconfig.php';
                $sqls = "SELECT * FROM agent_register where Email = '$email' Limit 1";
                $aaa = mysqli_query($connect, $sqls);
                $row = mysqli_fetch_array($aaa);
                if (password_verify($password, $row['Password'])) {

                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $row['Password'];
                    $_SESSION['usertype'] = $usertype;

                    if ($_POST['remember_me'] == 1 || $_POST['remember_me'] == 'on') {
                        $hour = time() + 3600 * 24 * 30;
                        setcookie('email', $email, $hour);
                        setcookie('password', $row['Password'], $hour);
                        setcookie('usertype', $usertype, $hour);
                    }

                    //Redirect to new page
                    echo "login success";
                    header('location:employee/e_dashboard.php');
                    exit();
                } else {
                    echo "login fail";
                }
            }
        }
    }
}

?>