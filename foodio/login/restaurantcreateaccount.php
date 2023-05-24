<?php

session_start();
session_destroy();	


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

      <a href="restaurantloginpage.php" class="book-a-table-btn scrollto">Login</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Create Account Section ======= -->
    <section id="review" class="review">
      <div class="container">

        <div class="section-title">
          <h2><span><br>Create</span> Restaurant Account</h2>
          <p>Please fill out the information to create an account!</p>
        </div>
      
		<h4>
		<?php
		require_once '../dbinfo.php';

		$conn = new mysqli($hn, $un, $pw, $db);
		if($conn->connect_error) die($conn->connect_error);
		
		echo <<<_END
		<h5>
		<form action='restaurantcreateaccount.php' method='post'>
		<pre>	 
		<input type="text" class="form-control" name="restaurantname" id="restaurantname" placeholder="Restaurant Name" required>
		<input type="text" class="form-control" name="ownername" id="ownername" placeholder="Owner Name" required>
		<input type="text" class="form-control" name="email" id="email" placeholder="Restaurant Email Address" required>
		<input type="text" class="form-control" name="address" id="address" placeholder="Restaurant Address" required>
		<input type="text" class="form-control" name="phone" id="phone" placeholder="Restaurant Phone" required>
		<input type="text" class="form-control" name="description" id="description" placeholder="Restaurant Description" required>
		<input type="text" class="form-control" name="type" id="type" placeholder="Restaurant Type" required>
		<input type="text" class="form-control" name="password" id="password" placeholder="Password" required>
		</pre>
		<input type='hidden' name='add' value='yes'>
			<div class="text-center"><button type="submit">Create Account</button></div>
		</form>
		<br>
		</h5>
		
		_END;
		if(isset($_POST['add'])){
			$restaurantname = $_POST['restaurantname'];
			$owner = $_POST['ownername'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$description = $_POST['description'];
			$type = $_POST['type'];
			$password = $_POST['password'];

			$salt1 = 'gm&h*';
			$salt2= 'pg!@';
			$password = hash('ripemd128', "$salt1$password$salt2");
			
			$query = "INSERT into restaurant (restaurant_name, restaurant_password, restaurant_description, address, owner_name, phone, restaurant_email, restaurant_type) values ('$restaurantname', '$password', '$address','$description','$owner', '$phone', '$email', '$type')";

			$result = $conn->query($query);
			if(!$result) die($conn->error);
			header("Location: restaurantloginpage.php");
			}
		$conn->close();
		?>
		</h4>
	  </div>
   
	  <div class="container">

        <div class="section-title">
          <h3><span><br><br>Existing</span> Restaurant?</h3>
          <p><a href = "restaurantloginpage.php">Sign In.</a></p>
		  <p>Not a restaurant? Click<a href = "userloginpage.php"> here</a></p>
        </div>
      </div>
    </section><!-- End Login Section -->


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







