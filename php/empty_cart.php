<?php
	include_once('db_connect.php');
	if(!isset($_SESSION))
		session_start();
	$user = $_SESSION['username'];
	$sql = "delete from  cart where m_username='$user'";
	mysqli_query($db, $sql);
?>