<?php
$page_roles = array('A','U','R');

require_once '../authentication/checksession.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Food.io - Hungry House</title>
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
              <h1><br><strong>Hungry House<strong></h1>
			  <h3>Followers: <span>
			  <?php
				require_once '../dbinfo.php';

				$conn = new mysqli($hn, $un, $pw, $db);
				$query = "Select count(user_ID) from follow where restaurant_ID = 2"; 
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
                Hungry House is focused on making healthy eating easy, convenient, and sustainable. We offer dishes that are both nutritious and delicious. We use all locally sourced organic ingredients to create our house-made rice bowls, salads, sandwiches, and acai bowls--free of preservatives or refined sugars. With vegetarian and gluten-free options available, we have something for everyone. Don't forget to check out our dessert menu for some of the best smoothie bowls in Salt Lake!
              </p>
			  <?php
					if($_SESSION['role'] == 'U'){
						require_once '../dbinfo.php';

						$conn = new mysqli($hn, $un, $pw, $db);
						$user = $_SESSION['userID'];
						$query = "Select * from follow where user_ID = '$user' and restaurant_ID = '2'"; 
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
							<input type='hidden' name='restaurant' value='Hungry House'>
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
              <a href="../assets/img/hungryhouse/hungryhouse-1.jpg" class="gallery-lightbox">
                <img src="../assets/img/hungryhouse/hungryhouse-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="../assets/img/hungryhouse/hungryhouse-2.jpg" class="gallery-lightbox">
                <img src="../assets/img/hungryhouse/hungryhouse-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="../assets/img/hungryhouse/hungryhouse-3.jpg" class="gallery-lightbox">
                <img src="../assets/img/hungryhouse/hungryhouse-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="../assets/img/hungryhouse/hungryhouse-4.jpg" class="gallery-lightbox">
                <img src="../assets/img/hungryhouse/hungryhouse-4.jpg" alt="" class="img-fluid">
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
              <a href="#">Create Your Own Bowl</a><span>$10.99</span>
            </div>
			<div class="menu-ingredients">
              Choose one base, two protiens, and add as many toppings as you want.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <div class="menu-content">
              <a href="#">Chicken Bowl</a><span>$9.99</span>
            </div>
			<div class="menu-ingredients">
              Our signature grilled chicken with your choice of rice or quinoa, topped with fresh veggies and our special sauce.
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-starters">
            <div class="menu-content">
              <a href="#">The Vegetarian </a><span>$8.99</span>
            </div>
			<div class="menu-ingredients">
              Tofu, chickpeas, and quinoa topped with fresh vegetables and our spciy peanut sauce
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <div class="menu-content">
              <a href="#">The PB Lover</a><span>$10.99</span>
            </div>
			<div class="menu-ingredients">
			 Organic Açai, almond milk, apple juice, peanut butter, bananas, and organic flax seed blended to perfection. Topped with banana slices, crushed peanuts, creamy peanut butter, granola, and honey.
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
                <h3>Peter Cash</h3>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
				  Healthy, hearty, and delicious. 
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <h3>Alissia Underwood</h3>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
				  We loved all the vegetarian bowls here ! Visited this place in the beginning of the summer and they had a lot of veggie/vegan options.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <h3>Russell Crossley</h3>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  A friend recently suggested we meet here for dinner. The menu is full of healthy exciting options and it was hard to decide what to get. Ultimately I got the Mediterranean bowl and overall it was delicious!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <h3>Makenzie Rogers</h3>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 If you want to feel better after eating somewhere, this is the place! The food is amazing, the service is personable and I fully endorse it!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <h3>Jules Dillard</h3>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 I love a good "choose your own adventure" place. I love seeing the ingredients before & during the process of them becoming my meal so this place was already in my favor as I walked in the door. 
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
		<input type='hidden' name='restaurant' value='Hungry House'>
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