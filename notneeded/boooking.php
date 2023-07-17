<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit();
}

include 'dbconfig.php';
// Add any additional code as per your requirements, such as connecting to the database.
if (isset($_POST['submit'])) {
    // Retrieve form data
  
    $service = $_POST['service'];
    $name=$_SESSION['name'];
    $email=$_SESSION['email'];
    echo "$name";
    // Retrieve other form fields as needed
    
    // Perform validation on the form inputs
    if (empty($name) || empty($email) || empty($service)) {
        // Handle validation errors
        echo "Please fill in all required fields.";
        exit();
    }
    
    // Process the booking and store in the database
    // You can use SQL queries or an ORM library to interact with the database
    
    // Example SQL query to insert the booking into a 'bookings' table
    $sql = "INSERT INTO bookings (name, email, service) VALUES ('$name', '$email', '$service')";
    
    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Booking successfully created
        echo "Booking has been successfully created!";
    } else {
        // Error handling for failed booking creation
        echo "Error creating booking: " . mysqli_error($conn);
    }
    
    // Close the database connection
    mysqli_close($conn);
} else {
    // Redirect the user back to the booking page if accessed directly without form submission
    // header('location: booking.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <!-- Include any necessary CSS stylesheets -->
   
</head>
<body>
    <h1>Booking Form</h1>
    <form method="post" action="booking.php">

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        
        <label for="service">Service:</label>
        <select name="service" id="service">
            <option value="haircut">Haircut</option>
            <option value="hairstyling">Hairstyling</option>
            <!-- Add more options as per your available services -->
        </select>
        
        <!-- Add more input fields for date, time, etc. -->
        
        <input type="submit" value="Book Now">
    </form>
</body>
</html>
