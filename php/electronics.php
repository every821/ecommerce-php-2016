<?php
	require_once('db_connect.php');
	$sql = "SELECT * FROM item WHERE category='Electronics' AND available=1";
	$result = mysqli_query($db, $sql) or die("Fail");
	$row = mysqli_fetch_all($result, MYSQLI_BOTH);
?>