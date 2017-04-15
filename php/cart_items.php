<?php
	include_once('db_connect.php');
	if(!isset($_SESSION))
		session_start();
	$user = $_SESSION['username'];
	$sql = "SELECT * from cart WHERE m_username='$user'";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_all($result, MYSQLI_BOTH);
?>