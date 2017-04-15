<?php
	include_once('php/db_connect.php');
	$user = $_SESSION['username'];
	$sql = "SELECT * from item i
			INNER JOIN staffadditem s 
			ON i.i_id=s.i_id 
			WHERE s_username='$user'";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_all($result, MYSQLI_BOTH);
?>