<?php
	include_once('db_connect.php');
	$id = $_POST['id'];
	$sql = "delete from item WHERE i_id=$id";
	$result = mysqli_query($db, $sql);
	$sql = "delete from staffadditem WHERE i_id=$id";
	$result = mysqli_query($db, $sql);
?>