<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:../login.php');
}
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

    table caption {
        font-weight: bold;
        margin-bottom: 10px;
    }
</style>

<body>
    <div class='wrapper'>
        <?php
        include "../dbconfig.php";
        ?>
        <div class='sidebar'>
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
            <!-- <h2>TO add the agent </h2><a href="add_agent.php">add_agent </a> -->
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
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
                        <td><a class='button' href="edit_agent.php?id=<?php echo $row['a_Id']; ?>">Edit</a></td>
                        <!-- <td><a href="view.php?id=<?php echo $row['a_Id']; ?>">View</a></td> -->
                        <td><a class='button' href="delete_agent.php?id=<?php echo $row['a_Id']; ?>">Delete</a></td>

                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>