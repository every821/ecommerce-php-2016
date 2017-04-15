<?php
	include_once('db_connect.php');
	if(!isset($_SESSION))
		session_start();
	$user = $_SESSION['username'];
	$id = $_POST['id'];
	$sql = "delete from cart WHERE i_id=$id AND m_username='$user'";
	$result = mysqli_query($db, $sql);
?>