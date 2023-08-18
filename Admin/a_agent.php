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
        background-color: rgba(0, 0, 0, 0.523);
    }

    table caption {
        font-weight: bold;
        margin-bottom: 10px;
    }
</style>

<body>
    <div class='wrapper'>
        <?php
        // include "../dbconfig.php";
        ?>
        <div class='sidebar' style="position: sticky;">
            <?php
            include '../Component/a_sidebar.php';
            ?>
        </div>
        <?php
        $agentQuery = "SELECT * FROM agent_register";
        $agentResult = mysqli_query($connect, $agentQuery);
        ?>
        <!-- Agent table starts -->
        
        <div class='content'>
        <h2 style="color:black; text-align:center;" >Agent Table</h2>
        <a class="btn" href="add_agent.php">Add Agent</a>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th colspan="2" style="text-align:center">Activity</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($agentResult)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['a_Id']; ?>
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
                        <td><a class='btn' href="edit_agent.php?id=<?php echo $row['a_Id']; ?>">Edit</a></td>
                        <!-- <td><a href="view.php?id=<?php echo $row['a_Id']; ?>">View</a></td> -->
                        <td><a class='btn' href="delete_agent.php?id=<?php echo $row['a_Id']; ?>">Delete</a></td>

                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>