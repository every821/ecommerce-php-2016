<?php
	include('php/db_connect.php');
	$i_id = $_GET['id'];
	$sql = "SELECT * FROM item where i_id=$i_id";
	$result = mysqli_query($db, $sql);
	$row1 = mysqli_fetch_assoc($result);
	$sql = "SELECT s_name FROM staff s
			inner join staffadditem i
			on s.s_username = i.s_username
			where i.i_id=$i_id";
	$result = mysqli_query($db, $sql);
	$row2 = mysqli_fetch_assoc($result);
?>