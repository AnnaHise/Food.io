<?php
$page_roles = array('A','U','R');

require_once 'authentication/generalchecksession.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Food.io - Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1><a href="home.php">Food.io</a></h1>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="home.php">Home</a></li>
          <li><a class="nav-link scrollto" href="redirect.php">Profile</a></li>
          <li><a class="nav-link scrollto" href="contactus.php">Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="login/userloginpage.php" class="book-a-table-btn scrollto">Sign Out</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Slices</h2>
                <p class="animate__animated animate__fadeInUp">Slices takes no shortcuts! We believe that quality takes time. It would be a MIRACLE if you get your pizza in less than five minutes! Our pizza dough is made from scratch, 
				double proofed for 24 hours, then hand-rolled and tossed the traditional way for unmatched flavor. We hand shred our whole milk mozzarella and slice our meats and vegetables 
				fresh every morning. Everything at Skuces is made to order. No frozen crusts or bagged cheese here. Our sauces and dressings are made in-house too. We like to consider ourselves 
				old school and the proof is in the Slices! We do this not because it's the new culinary trend, we do this because we have done it that way for over 40 years. To us, it's more about 
				the interaction than the transaction.</p>
                <div>
                  <a href="restaurants/slices.php" class="btn-menu animate__animated animate__fadeInUp scrollto">View Page</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Just Like Home</h2>
                <p class="animate__animated animate__fadeInUp">Homestyle cooking and a warm inviting atmosphere make Just Like Home feel…well, just like home! We pride ourselves in using the freshest quality ingredients, opting for local and organic products to help support our own. All recipes are made from scratch and fresh to order daily! Our full menu is offered all day, so you are guaranteed to find a dish you’ll love! 
				</p>
                <div>
                  <a href="restaurants/just%20Like%20Home.php" class="btn-menu animate__animated animate__fadeInUp scrollto">View Page</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Hungry House</h2>
                <p class="animate__animated animate__fadeInUp">Hungry House is focused on making healthy eating easy, convenient, and sustainable. We offer dishes that are both nutritious and delicious. We use all locally sourced organic ingredients to create our house-made rice bowls, salads, sandwiches, and acai bowls--free of preservatives or refined sugars. With vegetarian and gluten-free options available, we have something for everyone. Don't forget to check out our dessert menu for some of the best smoothie bowls in Salt Lake!
				</p>
                <div>
                  <a href="restaurants/hungry%20House.php" class="btn-menu animate__animated animate__fadeInUp scrollto">View Page</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->
  
  
      <!-- ======= Restaurant List Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section">
		  <h2>
		  <?php
				require_once 'dbinfo.php';

				$conn = new mysqli($hn, $un, $pw, $db);
				if($conn->connect_error) die($conn->connect_error);
				
				$query = "SELECT r.restaurant_name, r.restaurant_description, (Select count(user_ID) from follow as f where f.restaurant_ID = r.restaurant_ID)as followers,ifnull(avg(re.rating), 'N/A')as averageRating
				From restaurant as r
				left outer join follow as f on r.restaurant_ID = f.restaurant_ID
				left outer join review as re on r.restaurant_ID = re.restaurant_ID
				Group by r.restaurant_name, r.restaurant_description";
				
				$result = $conn->query($query);
				if(!$result) die($conn->error);
				
				$rows = $result->num_rows;
				
				for($j=0; $j<$rows; ++$j){
					$result->data_seek($j);
					$row = $result->fetch_array(MYSQLI_NUM); 
					
				echo <<<_END
					<h1><a href= "restaurants/$row[0].php">$row[0]</a><br></h1>
					<h3>$row[1]<br></h3>
					<h4>Followers: $row[2]<br></h4>				
					<h4>Average Rating: $row[3]<br><br></h4>
					<h4>_________________________________________________________________________________________________________<br><br></h4>
				_END;
					
				}

				$result->close();
				$conn->close();
			?>
			</h2>
			
		  <h1><br><br><br><br></h1>
        </div>
      </div>

      </div>
      </div>

      </div>
    </section><!-- End Restaurant ListSection -->

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
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>