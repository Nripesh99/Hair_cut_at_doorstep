<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../Css/booking_index.css">


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
</head>

<body>
  <div class='wrapper'>
    <?php
    include "../dbconfig.php";
    session_start();
    include "../session/c_session.php";
    $c_id = $_GET['c_id'];
    $today = date('Y-m-d');
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



    <div class='sidebar'>
      <?php include '../Component/c_sidebar.php'; ?>

    </div>

    <div class='content'>
      <!-- Pending Bookings Table -->
      <table>
        <caption>
          Pending Bookings
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
          <th>Delete your booking?</th>
        </tr>
        <?php foreach ($pendingBookings as $i => $row) { ?>
          <tr>
            <td>
              <?php echo $i + 1; ?>
            </td>
            <td>
              <?php echo $row['b_id']; ?>
            </td>
            <td>
              <?php echo $row['s_id']; ?>
            </td>
            <td>
              <?php echo $row['s_name']; ?>
            </td>
            <td>
              <?php echo $row['booking_date']; ?>
            </td>
            <td>
              <?php echo $row['t_price']; ?>
            </td>
            <td>
              <?php echo $row['c_name']; ?>
            </td>
            <td>
              <?php echo $row['c_adddress']; ?>
            </td>
            <td>
              <?php echo $row['c_insidevalley']; ?>
            </td>
            <td>
              <?php echo $row['id']; ?>
            </td>
            <td>
              <?php echo $row['status']; ?>
            </td>
            <td><a class='btn'
                href="delete_booking.php?id=<?php echo $row['b_id']; ?>&c_id=<?php echo $row['id']; ?>">Delete</a></td>

          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</body>