

<?php

session_start();

require_once 'dbinfo.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_SESSION['userID'])){
	
	$userID = $_SESSION['userID'];
	$restaurantname = $_POST['restaurant'];
	$subject = $_POST['subject'];
	$review = $_POST['message'];
	$rating = $_POST['rating'];
	$date = date("Y-m-d");
	
	
	$query = "INSERT into review (restaurant_ID, user_ID, subject, review, rating, review_date) 
	values ((select restaurant_ID from restaurant where restaurant_name = '$restaurantname'), '$userID', '$subject' ,'$review','$rating','$date')";
	
	
	$conn->query($query);
		
	header("Location: restaurants/$restaurantname.php");
}else{
	header("Location: restaurants/$restaurantname.php");
}
$conn->close();



?>