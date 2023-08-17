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
        text-align: center;
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

    .product-image {
        max-width: 300px;
        max-height: 200px;
        overflow: hidden;
        
    }
    .image{
        text-align: center;
    }

    img {
        max-width: 20%;
        height: auto;
        
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
        $serviceQuery = "SELECT * FROM services";
        $serviceResult = mysqli_query($connect, $serviceQuery);
        ?>
        <!-- Agent table starts -->

        <div class='content'>
            <h2 style="color:black; text-align:center;">Service Table</h2>
            <a class="btn" href="add_service.php">Add Service</a>
            <!-- <h2>TO add the agent </h2><a href="add_agent.php">add_agent </a> -->
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>time_in_min</th>
                    <th>Image</th>
                    <th colspan="2" style="text-align:center">Activity</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($serviceResult)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['s_id']; ?>
                        </td>
                        <td>
                            <?php echo $row['s_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['s_price']; ?>
                        </td>
                        <td>
                            <?php echo $row['s_time']; ?>
                        </td>
                        <td class='image'>
                            <?php $a = $row['s_image']; ?>
                            <div class="product-image">
                                <img src="<?php echo $a ?>" alt="Services">
                        </td>
                        <td><a class="btn" href="edit_service.php?id=<?php echo $row['s_id']; ?>">Edit</a></td>
                        <td><a class="btn" href="delete_service.php?id=<?php echo $row['s_id']; ?>">Delete</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>