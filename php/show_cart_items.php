<?php
	include_once('php/db_connect.php');
	$user = $_SESSION['username'];
	$sql = "SELECT * from item i
			inner join cart c
			on c.i_id=i.i_id
			WHERE m_username = '$user'";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_all($result, MYSQLI_BOTH);
?>