<?php
include '../dbconfig.php';
session_start();  
include '../session/e_session.php';
if(isset($_GET['a_id'])){

    $agent_id=$_GET['a_id'];
    // echo $agent_id;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $a_id = $_POST['agent_id'];

    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];

    // Fetch the hashed password from the database
    $query = "SELECT `Password` FROM agent_register WHERE a_Id= $a_id";
  
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['Password'];
 
    // Verify the current password
    if (password_verify($current_password, $hashed_password)) {
        // Hash the new password before updating
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the password in the database
        $update_query = "UPDATE agent_register SET Password = '$hashed_new_password' WHERE a_Id = $a_id";
        mysqli_query($connect, $update_query);
        $_SESSION['password']=$hashed_new_password;
        // Password changed successfully
        echo "Password changed successfully!";
    } else {
        // Incorrect current password
        echo "Incorrect current password. Password not changed.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <style>
        /* changepassword.css */

.container {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f4f4f4;
  border-radius: 8px;
}

.container h2 {
  text-align: center;
  margin-bottom: 20px;
  color: #333;
}

.container label {
  display: block;
  margin-bottom: 10px;
  color: #555;
}

.container input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
  margin-bottom: 20px;
}

.container input[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: blueviolet;
  color: #f4f4f4;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.container input[type="submit"]:hover {
  background-color:#f44336;
}

.container .error {
  color: #f44336;
  margin-bottom: 10px;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Change Password</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="agent_id" value="<?php echo $agent_id ?>">
            <label for="current_password">Current Password:</label>
            <input type="password" id="current_password" name="current_password" required><br>

            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required><br>

            <input type="submit" name="change_password" value="Change Password">
        </form>
        <button onclick="goBack()">Go Back</button>

<script>
  function goBack() {
    window.history.back();
  }
</script>
    </div>
</body>
</html>