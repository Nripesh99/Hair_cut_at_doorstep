<?php
            include "../dbconfig.php";
            $id = $_GET['id'];
            $sql = "DELETE  FROM services WHERE s_id = $id";
            $result=mysqli_query($connect,$sql);
            echo"data deleted succesfully";
            header('location:../admin/a_dashboard.php');
       
?>            

