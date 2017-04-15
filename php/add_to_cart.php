<?php
	include_once('db_connect.php');
	if(!isset($_SESSION))
		session_start();
	$user = $_SESSION['username'];
	$id = $_POST['id'];
	if($_SESSION['type']=='member') {
		$sql = "Select * from cart where m_username='$user' AND i_id=$id";
		$result = mysqli_query($db, $sql);
		if(mysqli_num_rows($result)==0) {
			$sql = "Insert into cart
					values ('$user', $id)";
			$result = mysqli_query($db, $sql);
			echo 2;
		} else
			echo 1;
	} else 
		echo 0;
?>