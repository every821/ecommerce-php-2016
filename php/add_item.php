<?php
	include_once('db_connect.php');
	if(!isset($_SESSION))
		session_start();
	$user = $_SESSION['username'];
	$itemname = $_POST['itemname'];
	$category = $_POST['category'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$sql = "INSERT INTO item (name, category, price, description)
			VALUES ('$itemname', '$category', '$price', '$description');";

	$result = mysqli_query($db, $sql);
	$sql = "SELECT LAST_INSERT_ID();";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_row($result);
	$item_id = $row[0];

	$sql = "INSERT INTO staffadditem (s_username, i_id, date_added)
			VALUES ('$user', $item_id, now());";
	$result = mysqli_query($db, $sql);

	$target_dir = "../images/itemimages/";
	mkdir($target_dir.$item_id,0777);
	$target_dir = "../images/itemimages/".$item_id."/";

	for($i=1;$i<=4;$i++) {
		if(isset($_FILES["image".$i])) {
			$target_file = $target_dir . basename($i.".jpg");
			move_uploaded_file($_FILES["image".$i]["tmp_name"], $target_file);
		} else
			break;
	}
	header('Location: ../staffprofile.php');
?>