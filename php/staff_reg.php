<?php
	include("db_connect.php");

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$name = $firstname.' '.$lastname;
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$query1= "SELECT s_email FROM staff WHERE s_email='$email'";
	$query2= "SELECT s_username FROM staff WHERE s_username='$username'";
	$result1 = mysqli_query($db, $query1) or die("Fail at query 1");
	$result2 = mysqli_query($db, $query2) or die("Fail at query 2");

	$count1 = mysqli_num_rows($result1);
	$count2 = mysqli_num_rows($result1);

	if($count1==0 && $count2==0){
		$sql = "INSERT INTO staff(s_username, s_name, password, s_address, s_email, s_phone) VALUES('$username', '$name', '$password', '$address', '$email', '$phone');";
		$result = mysqli_query($db, $sql) or die("Fail to update database.");
		session_start();
		$_SESSION['type'] = "staff";
		$_SESSION['name'] = $name;
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['phone'] = $phone;
		$_SESSION['address'] = $address;
		
		header('Location: ../staffprofile.php');
	}
	else{
		echo "Fail";
		header("Location: ./login.php");
	}
?>
