<?php
            include "../hair_cut_at_doorstep/dbconfig.php";
            $id = $_GET['id'];
            
            $sql = "DELETE  FROM booking_test WHERE b_id = $id";
            $result=mysqli_query($connect,$sql);
            echo"data deleted succesfully";
            $c_id=$_GET['c_id']; 
            header("location:../hair_cut_at_doorstep/c_dash.php?c_id=" . urlencode($c_id));
            
       
?>            

