<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="../Css/a_sidebar.css" />
</head>
<style>
   .sidebar {
        position: sticky;
        top: 0; 
        z-index: 100; 
    }
</style>

<body>
  <section class="container">
    <div class="sidebar" >
      <header>
        <h2>Admin Panel</h2>
      </header>
      <aside>
        <a href="a_dashboard.php">Dashboard</a>
        <a href="a_customer.php">Customer</a>
        <a href="a_agent.php">Agent</a>
        <a href="a_service.php">service</a>
        <a href="a_booking.php">booking</a>
        <a href="a_feedback.php">Feedback</a>
        
        

        <a href="../logout.php">Logout</a>
      </aside>
    </div>
  </section>
</body>

</html>