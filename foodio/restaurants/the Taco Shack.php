<?php
$page_roles = array('A','U','R');

require_once '../authentication/checksession.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Food.io - The Taco Shack</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1><a href="../home.php">Food.io</a></h1>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="../home.php">Home</a></li>
          <li><a class="nav-link scrollto" href="../redirect.php">Profile</a></li>
          <li><a class="nav-link scrollto" href="../contactus.php">Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="../login/userloginpage.php" class="book-a-table-btn scrollto">Sign Out</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-3">
            <h3></h3>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content">
              <h1><br><strong>The Taco Shack<strong></h1>
			  <h3>Followers: <span>
			  <?php
				require_once '../dbinfo.php';

				$conn = new mysqli($hn, $un, $pw, $db);
				$query = "Select count(user_ID) from follow where restaurant_ID = 7"; 
				if($conn->connect_error) die($conn->connect_error);
				
				$result = $conn->query($query);
				if(!$result) die($conn->error);
				
				$rows = $result->num_rows;
				
				for($j=0; $j<$rows; ++$j){
					$result->data_seek($j);
					$row = $result->fetch_array(MYSQLI_ASSOC); 
					echo $row['count(user_ID)'];
				}
				

				$result->close();
				$conn->close();
			  ?>
			  </span></h3>
              <p>
                Stop in and try one of our 12 signature tacos and experience the taste of traditional Mexican cuisine with an American twist. Our ingredients are hand-picked from local suppliers to ensure freshness and support our local community. Don’t let the name fool you—we have a dish for everyone! Check out our full menu for more food and drink options that are guaranteed to satisfy any craving.
              </p>
			  <?php
					if($_SESSION['role'] == 'U'){
						require_once '../dbinfo.php';

						$conn = new mysqli($hn, $un, $pw, $db);
						$user = $_SESSION['userID'];
						$query = "Select * from follow where user_ID = '$user' and restaurant_ID = '7'"; 
						if($conn->connect_error) die($conn->connect_error);
							
						$result = $conn->query($query);
						if(!$result) die($conn->error);
							
						$rows = $result->num_rows;
							
						for($j=0; $j<$rows; ++$j){
							$result->data_seek($j);
							$row = $result->fetch_array(MYSQLI_ASSOC); 
							$following =  $row['follow_ID'];
						}
						
						if(isset($following)){
							echo <<<_END
								<h1><u><br>Following</u></h1>
							_END;
							
						}else{
							echo <<<_END
							<h2>
							<form action='../follow.php' method='post'>
							<input type='hidden' name='follow' value='yes'>
							<input type='hidden' name='restaurant' value='The Taco Shack'>
							<input type='submit' value='Follow'>
							</form>
							</h2><br>
							_END;
						}
					}
				?>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container-fluid">

        <div class="section-title">
          <h2>Some photos from <span>Our Restaurant</span></h2>
        </div>

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="../assets/img/tacoshack/tacoshack-1.jpg" class="gallery-lightbox">
                <img src="../assets/img/tacoshack/tacoshack-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="../assets/img/tacoshack/tacoshack-2.jpg" class="gallery-lightbox">
                <img src="../assets/img/tacoshack/tacoshack-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="../assets/img/tacoshack/tacoshack-3.jpg" class="gallery-lightbox">
                <img src="../assets/img/tacoshack/tacoshack-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="../assets/img/tacoshack/tacoshack-4.jpg" class="gallery-lightbox">
                <img src="../assets/img/tacoshack/tacoshack-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Gallery Section -->
	
    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container">

        <div class="section-title">
          <h2>Check our tasty <span>Menu</span></h2>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
          </div>
        </div>

        <div class="row menu-container">

          <div class="col-lg-6 menu-item filter-starters">
            <div class="menu-content">
              <a href="#">Street Tacos</a><span>$9.99</span>
            </div>
			<div class="menu-ingredients">
             Rice, black beans, sweet corn, pico de gallo, and our house-made cilantro ranch served with corn tortillas and loaded with your choice of meat.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <div class="menu-content">
              <a href="#">Taco Salad</a><span>$12.99</span>
            </div>
			<div class="menu-ingredients">
             Everything you love about a taco, without the shell. Includes your choice of meat and dressing.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-starters">
            <div class="menu-content">
              <a href="#">"Taco Shack" Tacos</a><span>$9.99</span>
            </div>
			<div class="menu-ingredients">
              3 hard shell corn tortillas filled with your choice of seasoned shredded beef or chicken, garnished with lettuce, guacamole, and our house-made salsa.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <div class="menu-content">
              <a href="#">Guacamole & Chips</a><span>$10.99</span>
            </div>
			<div class="menu-ingredients">
             Avocado, onions, cilantro, and our house-made salsa. Made fresh daily.
            </div>
          </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Menu Section -->
	
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container position-relative">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <h3>Harvey Thompson</h3>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Be sure to look at the entire menu( it's expansive). I really enjoyed enchiladas with mole though the other dishes with tortillas in the side also looked good.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <h3>Jax Pacheco</h3>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
				  Service very good, our waitress was very nice and attentive despite all the tables she was waiting. 
                  
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <h3>Anastazja Newman</h3>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  The hype?! Oh yeah... it's most certainly real. This is some legit Mexican food!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <h3>Albie Holden</h3>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Visiting SLC, I was brought here by locals. They are foodies just like me, so I knew I was in for a treat. The atmosphere and decor is simple and nothing spectacular, but the service, the drinks and the FOOD was everything! 
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <h3>Gianni Pate</h3>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  One of the best food joint Salt Lake has to offer!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Review Section ======= -->
    <section id="review" class="review">
      <div class="container">

        <div class="section-title">
          <h2><span>Submit</span> a Review</h2>
          <p>Please fill out the information below to submit a review.</p>
        </div>
      </div>

        <form action="../addreview.php" method="post">
		<pre>
        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
        <input type="text" class="form-control" name="rating" id="rating" placeholder="Rating" required>
        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
		<input type='hidden' name='restaurant' value='The Taco Shack'>
        <div class="text-center"><h4><button type="submit">Send Review</button></h4></div>
        </form>
      </div>
    </section><!-- End Review Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Food.io</h3>
      <p>Know where to go, before you go.</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>