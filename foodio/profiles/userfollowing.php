<?php
$page_roles = array('A','U');

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

    <!-- ======= Restaurant Followers Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h1><span><br>Restaurants Following</h1>
		  <?php
				require_once '../dbinfo.php';

				$conn = new mysqli($hn, $un, $pw, $db);
				$userID = $_SESSION['userID'];
				$query = "select r.restaurant_name, f.follow_ID
				from restaurant as r 
				inner join follow as f on r.restaurant_ID = f.restaurant_ID
				inner join user as u on f.user_ID = f.user_ID
				where f.user_ID = $userID
				group by r.restaurant_name";
				if($conn->connect_error) die($conn->connect_error);

				$result = $conn->query($query);
				if(!$result) die($conn->error);
				
				$rows = $result->num_rows;
				
				for($j=0; $j<$rows; ++$j){
					$result->data_seek($j);
					$row = $result->fetch_array(MYSQLI_NUM); 
				
				echo <<<_END
					<h2><a href="../restaurants/$row[0]">$row[0]</a><h2>
					<h5>
					<form action='userfollowing.php' method='post'>
						<input type='hidden' name='unfollow' value='yes'>
						<input type='hidden' name='followID' value='$row[1]'>
						<input type='submit' value='Unfollow'>
					</form>
					<br>
					</h5>
					
				_END;
				}
				
				if(isset($_POST['unfollow'])){
					
					$id = $_POST['followID'];
					
					$query = "Delete from follow where follow_ID = $id";
					
					$result = $conn->query($query);
					if(!$result) die($conn->error);
					
					header("Location: userfollowing.php");
				}
				

				$result->close();
				$conn->close();
		  
		  ?>
		  <h1><br><br><br><br></h1>
        </div>
      </div>

      </div>
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




