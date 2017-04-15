<?php
	ob_start();
	if(!isset($_SESSION))
		session_start();
	if($_SESSION['type']!="staff") {
		header('Location: ./index.php');
	} 
	ob_flush();
?>