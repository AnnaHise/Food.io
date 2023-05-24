<?php
$page_roles = array('A','U','R');

require_once 'authentication/redirectchecksession.php';

if($role == 'U'){
		header("Location: profiles/userprofile.php");
	}elseif($role == 'A'){
		header("Location: profiles/adminprofile.php");
	}elseif($role == 'R'){
		header("Location: profiles/restaurantprofile.php");
	}else{
		header("Location: authentication/unauthorized.php");
	}

?>