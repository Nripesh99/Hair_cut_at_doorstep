<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../mainproject/Css/login.css">
    <title class="title">Login Page</title>



</head>


<body class="container">
    
    <image class="logo" src="logo.png"></image><br><br>

    <div>Sign into your account</div>
    <form class="form" method="POST" onsubmit="return validatePassword()">
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" placeholder="Enter email" required><br>
        <label for="Password">Password</label><br>
        <input type="password" name="password" id="password" placeholder="password" required><br>
        <span id="message" style="color:red"> </span> <br><br>

        <label for="User_type">Choose User type:</label>
        <select name="User-type" id="User_type">
            <option value="Customer">Customer</option>
            <option value="Agent">Agent</option>
            <option value="Admin">Admin</option>
        </select>
        <br>
        
        <input type="submit" name="login" value="login"></input>


        <div class="registration">
            Don't have an Account? <a href="register.html">
                Register
            </a>

        </div>

    </form>

</body>
</html>
<?php 
 
 require 'dbconfig.php';
 @session_start();
 if (!isset ($title_SESSION[' token'])) {
     $token = $_SESSION['token'] = uniqid();
 } else {
     $token = $_SESSION[ 'token'];
 }
//  if (isset($_COOKIE ['admin_username'])) {
//       session_start();
//      $_SESSION['admin_username'] = $_COOKIE [ 'admin_username'];
//       header('location:admin_dashboard.php');
//  } 
     if (isset($_POST['login'])){
        // $process = false;
        // if (isset($_POST['_token']) && !empty($_POST['_token'])) {
        //      $formToken= $_POST['_token'];
        // if ($formToken !== $_SESSION['token']) {
        // $msg = "Invalid Token";
        // // echojson_encode(array('message' => 'Invalid Token'));
        // } else {
        // $process = true;
        // }
        // } else {
        // $msg = "Token not found ";
        // }
        $process=true;
        if($process){
            //create new array to store error
            
            $err=[];
            //checks whether the enter email is empty and whether or not the form have been submitted
            if(isset($_POST['email'])&& !empty($_POST['email'])){ 
                $email=$_POST['email'];
            }else{
                $err['email']="Enter email";
            }
            if(isset($_POST['password'])&& !empty($_POST['password'])){
                $password=$_POST['password'];
            }else{
                $err['password']="Enter password";
            }
            if(isset($_POST['User_type'])&& !empty($_POST['User_type'])){
                $usertype=$_POST['User_type'];
            }else{
                $err['User_type']="Enter User type";
            }
    
            //checking number of process it takes to login
            if(count($err)==0){
                
                if($usertype='Customer'){
                    $sql ="SELECT * FROM customer_register where status=1 and email=$email and password=$password";
                    $aa = mysqli_query($connect, $sql);
                    if($aa ->num_rows ==1){
                        $user=$result ->fetch_assoc();
                        // Start session
                    @session_start();
                    //store username into session
                    $_SESSION['email']=$user['email'];
                    $_SESSION['password']=$user['password'];
                    $_SESSION['User_type']=$user['User_type'];
                    // if(isset($_POST['remember'])){
                    //     setcookie('username', time()+7*24*60*60);
                    // }
                    //Redirect to new page
                    echo "Login succesfully";
                    header("location:homepage.php");
                    }else{
                        $msg="login Fail";
                    }
                }
    
            }
        }

     }

  
 
?>


