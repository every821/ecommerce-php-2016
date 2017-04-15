<?php
	include 'db_connect.php';
	if(!isset($_SESSION))
		session_start();
	$user=$_SESSION['username'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$oldpassword=$_POST['oldpassword'];
	$newpassword=$_POST['newpassword'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$sql="SELECT password from member where m_username='$user'";
	$result=mysqli_query($db, $sql);
	$pass=mysqli_fetch_assoc($result);

	if($oldpassword == $pass['password']){
		$sql = "UPDATE member SET m_name='$name', password='$newpassword', m_address='$address', m_email='$email', m_phone=$phone WHERE m_username='$user'";
		$result=mysqli_query($db, $sql);
		
		$target_dir = "../images/userprofileimages/";
		if(isset($_FILES["profileimage"])) {

			if(file_exists("../images/staffprofileimages/".$user.".jpg")){
				unlink("../images/staffprofileimages/".$user.".jpg");
			}

			$target_file = $target_dir . basename($user.".jpg");
			move_uploaded_file($_FILES["profileimage"]["tmp_name"], $target_file);
		}

		if($result) {
			$_SESSION['name'] = $name;
			$_SESSION['address'] = $address;
			$_SESSION['email'] = $email;
			$_SESSION['phone'] = $phone;
			header('Location: ../userprofile.php');
		}
		else
			echo "Fail";
	}
?>