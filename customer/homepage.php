<?php
include "../dbconfig.php";

// include_once "component/footer.php";
session_start();
include "../session/c_session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="icon" href="../images/icon.png" type="image/icon type">
    <link rel="stylesheet" href="../Css/fontawesome/css/all_min.css">
    <style>
        .success-message,
        .failure-message {
            display: none;
        }
    </style>


</head>
<?php include_once "../Component/header.php"; ?>

<body>





    <!-- =============== Banner Section===================================-->
    <section class="banner" id="banner">
        <div class="content">
            <h2>Hair_Cut At Doorstep</h2>
            <p>Salon <span>Like</span><span>Experience</span> <span>At</span> Home <span>.</span></p>
            <a href="booking.php" class="btn">Place Order</a>
        </div>
    </section>
    <section class="about" id="about">
        <div class="row">
            <div class="col50">
                <h2 class="titleText" style="color:blue;">About US</h2>
                <p>At Hair Salon at Doorstep, we bring the salon experience right to your doorstep, providing convenient
                    and professional hair services in the comfort of your own home. Our team of skilled and experienced
                    hairstylists is dedicated to delivering exceptional results, ensuring you look and feel your best
                    without the hassle of going to a traditional salon.With our passion for hair and commitment to
                    customer satisfaction, we strive to create a
                    personalized and enjoyable experience for each client. Whether you need a haircut, styling,
                    coloring, or any other hair service, our team is equipped with the latest techniques and trends to
                    cater to your unique needs and preferences.<br>
                    +977 9800000000</p>
            </div>
            <div class="col50">
                <div class="imgBox">
                    <img src="../images/homebg1.jpeg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- =============== About Section End===================================-->
    <!-- =============== Service Section===================================-->
    <section class="service" id="service">
        <div class="title">
            <h2 class="titleText">Our Service</h2>
            <p>Providing the best service </p>
        </div>

        <div class="content">
            <div class="box">
                <div class="imgBox">
                    <img src="../images/imagesicon1.png" alt="">
                </div>
                <div class="text">
                    <h3>Haircuts and Styling</h3>

                </div>
            </div>

            <div class="box">
                <div class="imgBox">
                    <img src="../images/imagesicon2.png" alt="">
                </div>
                <div class="text">
                    <h3>Hair Coloring and Highlights</h3>

                </div>
            </div>

            <div class="box">
                <div class="imgBox">
                    <img src="../images/imagesicon3.png" alt="">
                </div>
                <div class="text">
                    <h3>Hair Treatments and Care</h3>

                </div>
            </div>
        </div>
    </section>
    <!-- =============== Service Section End===================================-->
    <!-- =============== Pricing Section ===================================-->
    <section class="price" id="price">
        <div class="title">
            <h2 class="titleText">Our Pricing</h2>

        </div>
        <div class="content">
            <?php
            $serviceQuery = "SELECT s_id, s_name, s_price, s_time, s_image FROM services LIMIT 6";
            $serviceResult = mysqli_query($connect, $serviceQuery);

            if ($serviceResult->num_rows > 0) {
                // Output data of each row
                $counter = 0; // Initialize a counter variable
            
                while ($row = $serviceResult->fetch_assoc()) {
                    $title = $row["s_name"];
                    $price = $row["s_price"];
                    $imagePath = $row["s_image"];

                    // Use the retrieved data to generate the HTML
                    echo '<div class="box">';
                    echo '    <div class="imgBox">';
                    echo '        <img src="../Admin/' . $imagePath . '" alt="">';
                    echo '    </div>';
                    echo '    <div class="text">';
                    echo '        <h3>' . $title . '</h3>';
                    echo '        <p>Rs.' . $price . '</p>';
                    echo '    </div>';
                    echo '</div>';

                    $counter++; // Increment the counter
            
                    // Break the loop if the counter reaches 6
                    if ($counter >= 6) {
                        break;
                    }
                }
            } else {
                echo "No results found";
            }

            // Close the database connection
            mysqli_close($connect);
            ?>
        </div>
        <div class="title">
            <a href="#" class="btn">View All</a>
        </div>
    </section>


    <!-- =============== Pricing Section End===================================-->
    <!-- =============== Testimonials Section ===================================-->

    <section class="testimonials" id="testimonials">
        <div class="title white">
            <h2 style="color:black;">They<span>S</span>aid About Us</h2>
            <p>We are passionate about changing the way you think about hair_cut_at_doorstep! </p>
        </div>
        <div class="content">
            <div class="box">
                <div class="imgBox">
                    <img src="../images/testi4.jpg" alt="">
                </div>
                <div class="text">
                    <p>I must express my appreciation for the convenience of having a professional hairstylist come to
                        my home. It eliminated the need to travel to a salon and provided a salon-like experience right
                        at my doorstep, with the stylist arriving punctually and fully equipped with all the necessary
                        tools and products.</p>
                    <h3>Nripesh</h3>
                </div>
            </div>

            <div class="box">
                <div class="imgBox">
                    <img src="../images/testi2.jpg" alt="">
                </div>
                <div class="text">
                    <p>I must express my appreciation for the convenience of having a professional hairstylist come to
                        my home. It eliminated the need to travel to a salon and provided a salon-like experience right
                        at my doorstep, with the stylist arriving punctually and fully equipped with all the necessary
                        tools and products.</p>
                    <h3>Niraj </h3>
                </div>
            </div>

            <div class="box">
                <div class="imgBox">
                    <img src="../images/testi3.jpg" alt="">
                </div>
                <div class="text">
                    <p>I must express my appreciation for the convenience of having a professional hairstylist come to
                        my home. It eliminated the need to travel to a salon and provided a salon-like experience right
                        at my doorstep, with the stylist arriving punctually and fully equipped with all the necessary
                        tools and products.</p>
                    <h3>Sami</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- =============== Testimonial Section End===================================-->

    <!-- =============== Contact Section ===================================-->

    <section class="contact" id="contact">
        <div class="row">
            <div class="contact-col">
                <div>
                    <i class=" fa fa-solid fa-house"></i>
                    <span>
                        <h5>GG Building</h5>
                        <p>Lazimpat, Kathmandu, NEPAL</p>
                    </span>
                </div>

                <div>
                    <i class=" fa fa-solid fa-phone"></i>
                    <span>
                        <h5>+977 9869059835</h5>
                        <p>Sunday to Saturday, 10AM to 8PM</p>
                    </span>
                </div>

                <div>
                    <i class=" fa fa-solid fa-envelope"></i>
                    <span>
                        <h5>haircutatdoor@gmail.com</h5>
                        <p>Email us your query</p>
                    </span>
                </div>

            </div>

            <div class="contact-col">
                <form action="contact.php" method="post" id="contact-form">
                    <input type="text" placeholder="Enter Your Name" required name="Name">
                    <input type="email" placeholder="Enter Email Address" required name="email">
                    <input type="text" placeholder="Enter Your Subject" required name="subject">
                    <textarea rows="8" placeholder="Message" required name="message"></textarea>
                    <button type="submit" name="contact" class="send_btn">Send Message</button>
                </form>
                <div class="success-message" style="display: none;">WE would contact you soon</div>
                <div class="failure-message" style="display: none;">Registration failed!</div>
            </div>
        </div>
    </section>
    <!-- =============== Contact Section End===================================-->
    <script>

    </script>

    <footer>
        <?php include_once "../component/footer.php" ?>
    </footer>
</body>

</html>