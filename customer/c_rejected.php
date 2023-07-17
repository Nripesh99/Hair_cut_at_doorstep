<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../Css/booking_index.css">
  </head>
  <style>
    .wrapper{
      display: flex;

    }
    
  </style>
  <body>
  <div class="wrapper">  
    <?php
    include '../dbconfig.php';
    include '../Component/c_sidebar.php';
  $c_id=$_GET['c_id'];
    $today=date('Y-m-d');
    // Separate bookings based on status
    $pendingBookings = array();
    $acceptedBookings = array();
    $rejectedBookings = array();
    //selecting data from database 
    $bookingQuery = "SELECT * FROM booking_test WHERE id='$c_id'";
    
    $bookingResult = mysqli_query($connect, $bookingQuery);
    while ($row = mysqli_fetch_assoc($bookingResult)) {
        $date = date('Y-m-d', strtotime($row['booking_date']));
    
        
            if ($row['status'] == 'pending') {
                $pendingBookings[] = $row;
            } elseif ($row['status'] == 'Accepted') {
                $acceptedBookings[] = $row;
            } elseif ($row['status'] == 'rejected') {
                $rejectedBookings[] = $row;
            }
        
    }
    ?>
    <!--Rejected booking table -->
    <table>
      <caption>
        Rejected Bookings
      </caption>
      <tr>
        <th>S.no</th>
        <th>Booking ID</th>
        <th>Service ID</th>
        <th>Service Name</th>
        <th>Booking date and time</th>
        <th>Total price</th>
        <th>Customer name</th>
        <th>Customer address</th>
        <th>Inside valley</th>
        <th>Customer ID</th>
        <th>Status</th>
       
      </tr>
      <?php foreach ($rejectedBookings as $i =>
      $row) { ?>
      <tr>
        <td><?php echo $i + 1; ?></td>
        <td><?php echo $row['b_id']; ?></td>
        <td><?php echo $row['s_id']; ?></td>
        <td><?php echo $row['s_name']; ?></td>
        <td><?php echo $row['booking_date']; ?></td>
        <td><?php echo $row['t_price']; ?></td>
        <td><?php echo $row['c_name']; ?></td>
        <td><?php echo $row['c_adddress']; ?></td>
        <td><?php echo $row['c_insidevalley']; ?></td>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['status']; ?></td>
      </tr>
      <?php } ?>
      </table>
  </div>    
  </body>
</html>
