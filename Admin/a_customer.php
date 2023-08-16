<?php
include '../dbconfig.php';
session_start();  
include '../session/a_session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<style>
    .wrapper {
        display: flex;
    }

    .sidebar {
        width: 20%;
        background-color: #f1f1f1;
        padding: 0px;
        position:sticky;
    }

    .content {
        width: 80%;
        padding: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    table caption {
        font-weight: bold;
        margin-bottom: 10px;
    }
    table td {
        color: #fff;
        /* Change text color to white */
        background-color: rgba(240, 143, 26, 0.223);
    }
</style>

<body>
    <div class='wrapper'>
        <div class='sidebar' style="position: sticky;">
            <?php
            include '../Component/a_sidebar.php';
            ?>
        </div>
        <?php
        $agentQuery = "SELECT * FROM customer_register";
        $agentResult = mysqli_query($connect, $agentQuery);
        ?>
        <!-- Agent table starts -->
        
        <div class='content'>
        <h2 style="color:black; text-align:center;" >Customer Table</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile_no</th>
                    <th>location</th>
                    <th>Inside valley</th>
                    
                
                </tr>
                <?php while ($row = mysqli_fetch_assoc($agentResult)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['Id']; ?>
                        </td>
                        <td>
                            <?php echo $row['Name']; ?>
                        </td>
                        <td>
                            <?php echo $row['Email']; ?>
                        </td>
                        <td>
                            <?php echo $row['Mobile_no']; ?>
                        </td>
                        <td>
                            <?php echo $row['location']; ?>
                        </td>
                        <td>
                            <?php echo $row['Inside_valley']; ?>
                        </td>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>