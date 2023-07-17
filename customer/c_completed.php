<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../Css/booking_index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="../Css/c_dashboard.css?=1">
</head>
<style>
  .component {
    display: flex;
  }


  .sidebar {
    flex: 0 0 0%;
    /* Adjust the width as needed */
  }

  .table-container {
    flex: 1;
    padding: 0px;
  }
 
    .wrapper{
      display: flex;

    }
  
</style>

<body>
  <div class="wrapper">
    <?php
    include "../dbconfig.php";


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
      } elseif ($row['status'] == 'completed') {
        $completedBookings[] = $row;
      }

    }
    ?>
    <div class="component">

      <header>
        <?php
        include '../Component/c_sidebar.php';
        ?>
      </header>
      <!--Completed booking table  -->
      <table>
        <caption>
          Completed Bookings
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
        <?php foreach ($completedBookings as $i => $row) { ?>
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
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</body>

</html>