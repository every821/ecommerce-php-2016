<?php
	ob_start();
	require_once('db_connect.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(isset($_POST['isstaff'])){
		$sql = "SELECT * FROM staff WHERE s_username='$username' AND password='$password'";
		$result = mysqli_query($db, $sql) or die("Login System Failed");
		$row = mysqli_fetch_array($result, MYSQLI_BOTH);
		if(mysqli_num_rows($result)==1) {
			session_start();
			$_SESSION['type'] = "staff";
			$_SESSION['name'] = $row['s_name'];
			$_SESSION['username'] = $row['s_username'];
			$_SESSION['email'] = $row['s_email'];
			$_SESSION['phone'] = $row['s_phone'];
			$_SESSION['address'] = $row['s_address'];
			
			header('Location: ../staffprofile.php');
		}
		else
			header('Location: ../login.php');
	}
	else{
		$sql = "SELECT * FROM member WHERE m_username='$username' AND password='$password'";
		$result = mysqli_query($db, $sql) or die("Login System Failed");
		$row = mysqli_fetch_array($result, MYSQLI_BOTH);
		if(mysqli_num_rows($result)==1) {
			session_start();
			$_SESSION['type'] = "member";
			$_SESSION['name'] = $row['m_name'];
			$_SESSION['username'] = $row['m_username'];
			$_SESSION['email'] = $row['m_email'];
			$_SESSION['phone'] = $row['m_phone'];
			$_SESSION['address'] = $row['m_address'];
			header('Location: ../index.php');
		}
		else
			header('Location: ../login.php');
	}
	ob_flush();
?>