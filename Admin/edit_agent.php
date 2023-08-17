
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country | EDIT</title>
    <link rel="stylesheet" href="../Css/aregister.css">

</head>
<body class='container'>
    <div class="content">
        <h2>Update Agent</h2>
        <hr>
        <a href="index.php">BACK</a>

        <?php
            include "../dbconfig.php";
            $id = $_GET['id'];
            $sql = "SELECT * FROM agent_register WHERE a_Id=".$id;
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){ ?>
                    <form action="" method="POST">
                        
                        <input type="hidden" name="agent_id" 
                        value="<?php echo $row['a_Id']; ?>">

                        <div class="form-input">
                            <label for="country_name">Name: </label>
                            <input type="text" name="Name" 
                                value="<?php echo $row['Name']; ?>">
                        </div>
                        <div class="form-input">
                            <label for="country_code">Email: </label>
                            <input type="text" name="Email" 
                            value="<?php echo $row['Email']; ?>">
                        </div>
                        <div class="form-input">
                            <label for="country_code">Mobile_no: </label>
                            <input type="text" name="Mobile_no" minlength="10" maxlength="10"
                            value="<?php echo $row['Mobile_no']; ?>">
                        <!-- <div class="form-input">
                            <label for="country_code">Password: </label>
                            <input type="password" name="Password" readonly
                            value=""> -->
                        </div>
                        <div class="form-input">
                            <label for="country_code">Location: </label>
                            <input type="text" name="Location" 
                            value="<?php echo $row['location']; ?>">
                        </div>

                        <input type="submit" name="btnUpdate" value="UPDATE">
                    </form>
               <?php }
            }

        ?>
    </div>
    <?php 
    if (isset($_POST['btnUpdate'])) {
        $id= $_POST['agent_id'];
        $name = $_POST['Name'];
        $email = $_POST['Email'];
        $mobile_no = $_POST['Mobile_no'];
        $location = $_POST['Location'];
        $password = $_POST['Password'];
       $password_hash=password_hash($password,PASSWORD_DEFAULT);
    
    
        $sql = "UPDATE  agent_register SET Name='$name', Email='$email', Mobile_no='$mobile_no',location='$location'WHERE a_Id='$id' ";
        $aa = mysqli_query($connect, $sql);
        if ($aa) {
            echo "Succsefully updated";
            header('location:../admin/index.php');
        }
        else{
            echo "error occured";
        } 
    } 

    ?>
<!-- 
    <a href="index.php?ID= <?php echo $row['id']?>"></a> -->

</body>
</html>