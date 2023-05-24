<?php
$page_roles = array('A', 'R');
 
require_once '../authentication/checksession.php';


?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Food.io</title>
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

    <!-- ======= Edit User Info Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2><span><br>Add New Food Item</span></h2>
		  <h4>
		  <?php
				require_once '../dbinfo.php';

				$conn = new mysqli($hn, $un, $pw, $db);
				if($conn->connect_error) die($conn->connect_error);
				
				if(isset($_POST['addfooditem'])){
						// $restaurant = $_POST['restaurant'];
						
						echo <<<_END
							<h5>
							<form action='addfooditem.php' method='post'>
							<pre>
								<input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
								<input type="text" class="form-control" name="description" id="description" placeholder="Description" required>
								<input type="text" class="form-control" name="type" id="type" placeholder="Type" required>
								<input type="text" class="form-control" name="price" id="price" placeholder="Price" required>
							</pre>
								<input type='hidden' name='add' value='yes'>
								<input type='submit' value='Add Item'>
							</form>
							<br>
							</h5>
							
						_END;
				}

				if(isset($_POST['add'])){
					
					$name = $_POST['name'];
					$description = $_POST['description'];
					$type = $_POST['type'];
					$price = $_POST['price'];
					$restaurant =	$_SESSION['restaurantID'];
						
					$query = "INSERT into food (restaurant_ID, food_name, food_description, food_type, price) values ('$restaurant','$name','$description','$type','$price')";
	
					$result = $conn->query($query);
					if(!$result) die($conn->error);
					
					header("Location: restaurantmenu.php");
				}
				
				$conn->close();
		  ?>
		  </h4>
		  <h1><br><br><br></h1>
        </div>
      </div>

      </div>
      </div>
      </div>

      </div>
    </section><!-- End User Info Section -->


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
 <!-- <script src="../assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>




