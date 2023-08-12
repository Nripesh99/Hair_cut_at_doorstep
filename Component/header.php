
<!DOCTYPE html>
<html lang="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    .logo {
    display: flex;
    align-items: center;
  }
  
  .logo img {
    width: 100px; 
    height: auto;
  }
  </style>
</head>
<body>
<header>
        <a class="logo" href="homepage.php"><img src="../Component/logo1234.png" alt="Hair-cut"></a>
        

        <div class="menuToggle" onclick="toggleMenu();"></div>
        <!-- =============== Navbar Section===================================-->
        <nav class="navigation">
            <li><a href="#banner" onclick="toggleMenu();" class="active">Home</a></li>
            <li><a href="homepage.php#about" onclick="toggleMenu();">About</a></li>
            <!-- <li><a href="#system" onclick="toggleMenu();">System</a></li> -->
            <li><a href="homepage.php#service" onclick="toggleMenu();">Service</a></li>
            <li><a href="homepage.php#price" onclick="toggleMenu();">Pricing</a></li>
            <li><a href="homepage.php#testimonials" onclick="toggleMenu();">Testimonials</a></li>
            <li><a href="homepage.php#contact" onclick="toggleMenu();">Contact</a></li>
           <li><a href="c_dashboard.php">C_Dashboard</a></li>
            <li><a href="booking.php" onclick="toggleMenu();">Booking</a></li>           
            <li><a href="../logout.php" onclick="toggleMenu();">Logout</a></li>
        </nav>
        <!-- =============== Navabar Section End===================================-->
    </header>
</body>
<script>
        // JavaScript to handle the sticky header behavior
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            header.classList.toggle('sticky', window.scrollY > 0);
        });
    </script>
</html>    
