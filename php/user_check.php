<?php
	ob_start();
	if(!isset($_SESSION))
		session_start();
	if($_SESSION['type']!="member") {
		header('Location: ./index.php');
	} 
	ob_flush();
?>