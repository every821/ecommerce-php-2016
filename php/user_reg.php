<?php
	include("db_connect.php");

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$name = $firstname." ".$lastname;
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$query1= "SELECT m_email FROM member WHERE m_email='$email'";
	$query2= "SELECT m_username FROM member WHERE m_username='$username'";
	$result1 = mysqli_query($db, $query1) or die("Fail at query 1");
	$result2 = mysqli_query($db, $query2) or die("Fail at query 2");

	$count1 = mysqli_num_rows($result1);
	$count2 = mysqli_num_rows($result1);

	if($count1==0 && $count2==0){
		$sql = "INSERT INTO member(m_username, m_name, password, m_address, m_email, m_phone) VALUES('$username', '$name', '$password', '$address', '$email', '$phone');";
		$result = mysqli_query($db, $sql) or die("Fail to update database.");
		session_start();
		$_SESSION['type'] = "member";
		$_SESSION['name'] = $name;
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['phone'] = $phone;
		$_SESSION['address'] = $address;
		
		header('Location: ../userprofile.php');	}
	else{
		echo "Fail";
		header("Location: ./login.php");
	}
?>
