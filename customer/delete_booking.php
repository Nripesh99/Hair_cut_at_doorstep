<?php
            include "../dbconfig.php";
            $id = $_GET['id'];
            
            $sql = "DELETE  FROM booking_test WHERE b_id = $id";
            $result=mysqli_query($connect,$sql);
            echo"data deleted succesfully";
            $c_id=$_GET['c_id']; 
            header("location:c_pending.php?c_id=" . urlencode($c_id));
            
       
?>            
