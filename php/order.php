<?php
	include 'db_connect.php';
	if(!isset($_SESSION))
		session_start();
	$user =$_SESSION['username'];
	$sql = "SELECT i_id from cart where m_username = '$user'";
	$result = mysqli_query($db, $sql);

	if(mysqli_num_rows($result)>0){
		$sql = "SELECT sum(price) as sum from item where i_id IN (SELECT i_id from cart where m_username = '$user')";
		$result = mysqli_query($db, $sql);
		$sum = mysqli_fetch_array($result);
		$sql = "INSERT INTO `order`(order_date, amount) VALUES(now(), $sum[sum])";
		$res = mysqli_query($db, $sql) or die("Insertion failed");
		$o_id = mysqli_insert_id($db);
		$sql = "INSERT INTO member_purchases VALUES('$o_id', '$user')";
		$res = mysqli_query($db, $sql) or die("Insertion failed");
		include_once('cart_items.php');
		for($i=0;$i<sizeof($row);$i++){
			$i_id = $row[$i]['i_id'];
			$sql = "INSERT INTO order_has_items(o_id, i_id) VALUES($o_id, $i_id)";
			$insert = mysqli_query($db, $sql) or die('Fail');
		}
		$sql = "UPDATE item SET available=0 where i_id IN (SELECT i_id from cart where m_username = '$user')";
		$res = mysqli_query($db, $sql) or die("Insertion failed");
		$sql = "INSERT INTO invoice(pay_date) VALUES(now())";
		$res = mysqli_query($db, $sql) or die("Insertion failed");
		$invoice_id = mysqli_insert_id($db);
		$sql = "INSERT INTO order_has_invoice VALUES('$invoice_id', '$o_id')";
		$res = mysqli_query($db, $sql) or die("Insertion failed");
		$sql = "DELETE from cart where m_username = '$user'";
		$result = mysqli_query($db, $sql);
		header('Location: ../index.php');
	}
?>