<?php

session_start();

if(!isset($_SESSION['email'])){
	header("Location: ../login/userloginpage.php");
	exit(); 
}else{
	$user = $_SESSION['email'];
	$role = $_SESSION['role'];
	
	$found = 0;
	
	if(in_array($_SESSION['role'],$page_roles )){
		$found = 1;
	}
	
	if(!$found){
		echo $_SESSION['email'];
		echo $_SESSION['role'];
		header("Location: unauthorized.php");
	}
	
}



?>

