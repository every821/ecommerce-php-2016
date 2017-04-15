<?php
	require_once('db_connect.php');
	if(!isset($_SESSION))
		session_start();
	$user = $_SESSION['username'];

	$sql = "SELECT * from staffadditem s
			inner join order_has_items oi
			on oi.i_id=s.i_id
			inner join member_purchases mp
			on  mp.o_id = oi.o_id
			inner join `order` o
			on o.o_id = mp.o_id
			inner join  member m
			on m.m_username = mp.m_username
			inner join item i
			on i.i_id = s.i_id
			WHERE s.s_username='$user'";

	$result = mysqli_query($db, $sql) or die("Fail");
	$row = mysqli_fetch_all($result, MYSQLI_BOTH);

	$sql = "SELECT i.category, COUNT(i.i_id) count, SUM(i.price) price FROM item i
			inner join staffadditem si
			on i.i_id = si.i_id
			WHERE si.s_username = '$user'
			GROUP BY i.category";
	$result = mysqli_query($db, $sql) or die("Fail");
	$row1 = mysqli_fetch_all($result, MYSQLI_BOTH);		

	$sql = "SELECT i.category, COUNT(i.i_id) count, SUM(i.price) price
			FROM item i
			inner join staffadditem si
			on si.i_id = i.i_id
			WHERE available = 1 AND si.s_username = '$user'
			GROUP BY i.category
			ORDER BY i.category";
	$result = mysqli_query($db, $sql) or die("Fail");
	$row2 = mysqli_fetch_all($result, MYSQLI_BOTH);	

	$sql = "SELECT i.category, COUNT(i.i_id) count, SUM(i.price) price
			FROM item i
			inner join staffadditem si
			on si.i_id = i.i_id
			WHERE available = 0 AND si.s_username = '$user'
			GROUP BY i.category
			ORDER BY i.category";
	$result = mysqli_query($db, $sql) or die("Fail");
	$row3 = mysqli_fetch_all($result, MYSQLI_BOTH);	
?>