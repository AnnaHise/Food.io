
<?php

require_once '../dbinfo.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['email']) && isset($_POST['password'])) {
	
	$tmp_email = mysql_entities_fix_string($conn, $_POST['email']);
	$tmp_password = mysql_entities_fix_string($conn, $_POST['password']);
	
	$salt1 = 'gm&h*';
	$salt2= 'pg!@';
	$tmp_password = hash('ripemd128', "$salt1$tmp_password$salt2");
	
	$query = "SELECT user_ID, password, role FROM user WHERE user_email = '$tmp_email'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	$passwordFromDB="";
	$role= "";
	for($j=0; $j<$rows; $j++){
		$result->data_seek($j); 
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$userID = $row['user_ID'];
		$passwordFromDB = $row['password'];
		$role = $row['role'];
	}
	
	if($tmp_password==$passwordFromDB){
		session_start();
		$_SESSION['userID'] = $userID;
		$_SESSION['email'] = $tmp_email;
		$_SESSION['role'] = $role;
		if($role=='U'){
			header("Location: ../profiles/userprofile.php");
		}else{
			header("Location: ../profiles/adminprofile.php");
		}
		
	}else{
		echo "Login Error";
		echo <<<_END
		<h4><a href='../login/restaurantloginpage.php'>Click to Return to Login Page</a></h4>
		_END;
	}	
}
$conn->close();


function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}


?>