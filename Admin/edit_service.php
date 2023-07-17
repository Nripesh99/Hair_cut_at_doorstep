
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country | EDIT</title>
</head>
<body>
    <div class="content">
        <h2>Update Agent</h2>
        <hr>
        <a href="index.php">BACK</a>

        <?php
            include "../dbconfig.php";
            $id = $_GET['id'];
            $sql = "SELECT * FROM services WHERE s_id=".$id;
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){ ?>
                    <form action="" method="POST">
                        
                        <input type="hidden" name="s_id" 
                        value="<?php echo $row['s_id']; ?>">

                        <div class="form-input">
                            <label for="country_name">Name: </label>
                            <input type="text" name="Name" 
                                value="<?php echo $row['s_name']; ?>">
                        </div>
                        <div class="form-input">
                            <label for="country_code">Price: </label>
                            <input type="text" name="price" 
                            value="<?php echo $row['s_price']; ?>">
                        </div>
                        <div class="form-input">
                            <label for="country_code">time: </label>
                            <input type="text" name="time" 
                            value="<?php echo $row['s_time']; ?>">
                        <input type="submit" name="btnUpdate" value="UPDATE">
                    </form>
               <?php }
            }

        ?>
    </div>
    <?php 
    if (isset($_POST['btnUpdate'])) {
        $id= $_POST['s_id'];
        $name = $_POST['Name'];
        $price = $_POST['price'];
        $time = $_POST['time'];     
        $sql = "UPDATE  services SET s_name='$name', s_price='$price', s_time='$time'WHERE s_id='$id' ";
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