<?php
session_start();
include '../dbconfig.php';
include '../session/c_session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="icon" href="../images/icon1.png" type="image/icon type">
    <link rel="stylesheet" href="../Css/fontawesome/css/all_min.css">

</head>
<style>
    body {
        background-color: wheat;
        padding-top: 50px;
    }

    .product-container {
        display: flex;
        align-items: center;
        text-align: center;
        margin-top: 30px;
        margin-bottom: 20px;
        margin-bottom: 20px;
        border-bottom: 5px solid #ccc;
        padding-bottom: 20px;
    }

    .product-description {
        flex: 1;
        text-align: left;
        padding-right: 50px;
        flex-direction: column;
    }

    .product-description h3 {
        font-size: 18px;
        margin-bottom: 5px;
    }

    .product-description p {
        font-size: 14px;
        margin-bottom: 5px;
    }

    .product-image {
        position: relative;
    }

    .product-image img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .book-button {
        padding: 12px 24px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        font-weight: bold;
        text-transform: uppercase;
        text-decoration: none;
        transition: background-color 0.3s ease;
        display: block;
        margin-top: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
    }

    .book-button:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .book-button:active {
        transform: translateY(1px);
    }
</style>


<body>

    <?php
    include '../Component/header.php';

    // Prepare and execute the SQL query
    $serviceQuery = "SELECT s_id, s_name, s_price, s_time, s_image FROM services";
    $serviceResult = mysqli_query($connect, $serviceQuery);

    // Fetch the results
    $serviceResults = $serviceResult->fetch_all(MYSQLI_ASSOC);

    ?>

    <!-- HTML layout with product details -->
    <?php foreach ($serviceResults as $row) { ?>
        <!-- <h1>Book now</h1> -->
        <div class="product-container">
            <div class="product-description">
                <h3>
                    <?php echo $row['s_name']; ?>
                </h3>
                <p>
                    <?php echo $row['s_time']; ?> Minute
                </p>
                <p>Price: Rs
                    <?php echo $row['s_price']; ?>
                </p>    
            </div>
            <?php $a = $row['s_image']; ?>
            <div class="product-image">
                <img src="../Admin/<?php echo $a ?>" alt="Services">
                <a href="javascript:void(0);" onclick="confirmBooking(<?php echo $row['s_id']; ?>)" class="book-button">Book  Now</a>
            </div>

            <script>
                function confirmBooking(serviceId) {
                    if (confirm("Are you sure you want to book this service?")) {
                        window.location.href = "booking_now.php?id=" + serviceId;
                    }
                }
            </script>

        </div>
    <?php } ?>
    <?php include '../Component/footer.php'; ?>
</body>
<footer>
    <?php ?>
</footer>

</html>