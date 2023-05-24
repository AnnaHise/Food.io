<?php

// $page_roles = array('U');

// require_once 'authentication/generalchecksession.php';

session_start();

require_once 'dbinfo.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['follow'])){
	
	$restaurant = $_POST['restaurant'];
	echo $restaurant;
	$userID = $_SESSION['userID'];       

	$query = "INSERT INTO follow (user_ID, restaurant_ID) VALUES($userID, (select restaurant_ID from restaurant where restaurant_name = '$restaurant'))";

			
	$conn->query($query);

	
	header("Location: restaurants/$restaurant.php");
}


$conn->close();



?>
