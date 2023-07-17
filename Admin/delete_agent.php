<?php
            include "../dbconfig.php";
            $id = $_GET['id'];
            $sql = "DELETE  FROM agent_register WHERE a_Id = $id";
            $result=mysqli_query($connect,$sql);
            echo"data deleted succesfully";
            header('location:../admin/index.php');
       
?>            

