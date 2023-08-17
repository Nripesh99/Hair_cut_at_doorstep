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
    table td {
        color: #fff;
        /* Change text color to white */
        background-color: rgba(0, 0, 0, 0.423);
    }

    table caption {
        font-weight: bold;
        margin-bottom: 10px;
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
        $agentQuery = "SELECT * FROM feedback";
        $agentResult = mysqli_query($connect, $agentQuery);
        ?>
        <!-- Agent table starts -->
        
        <div class='content'>
        <h2 style="color:black; text-align:center;" >Feedback Table</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>subject</th>
                    <th>Message</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($agentResult)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['f_id']; ?>
                        </td>
                        <td>
                            <?php echo $row['Name']; ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <?php echo $row['Subject']; ?>
                        </td>
                        <td colspan="2">
                            <?php echo $row['message']; ?>
                        </td>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>