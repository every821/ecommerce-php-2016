<!doctype html>
<html>
<head>
	<title>IIITA-Cart</title>
	<link rel="stylesheet" href="css/materialize.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/itemstyles.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class=""> 

<div class="overlay overlay-contentpush">
		<span type="button" class="overlay-close"></span>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="books.php">Books</a></li>
			<li><a href="electronics.php">Electronics</a></li>
			<li><a href="other.php">Other</a></li>
		</ul>
	</div>

	<div class="row" id="page">
		
		<div class="row" id="top-bar">
			<div class="col s3 left">
				<p class="brand-logo"><a href="index.php" class="white-text">IIITA-Cart</a></p>
			</div>
			<div class="col s9 full-height">
				<div class="col s1 offset-s10 center-align icons" id="account">
					<?php
						ob_start();
						if(!isset($_SESSION))
							session_start();
						if(isset($_SESSION['type'])) { 
					?>
							<a href="javscript:void(0)" data-target=""><i class="material-icons waves-effect">account_circle</i></a>
							<ul class="" id="account-opts">
								<?php 
									if($_SESSION['type']=='member') { 
								?>
									<li><a href="userprofile.php" class=""><i class="material-icons left prefix">person</i><?php echo $_SESSION['name']; ?></a></li>
									<li><i class="material-icons left">shopping_cart</i><span id="cart_items_no">
										<?php
											include('php/cart_items.php');
											echo mysqli_num_rows($result);
										?>
									</span> items in cart</li>
								<?php 
									} if($_SESSION['type']=='staff') { 
								?>
									<li><a href="staffprofile.php" class=""><i class="material-icons left prefix">person</i><?php echo $_SESSION['name']; ?></a></li>
								<?php 
									} 
								?>
								<li class="center-align">
									<form action="php/logout.php" class="center-align">
										<button type="submit" value="logout" class="btn waves-effect waves-light">Log out</button>
									</form>
								</li>
							</ul>
						<?php 
							} else { 
						?>
							<a href="login.php"><i class="material-icons waves-effect">account_circle</i></a>
					<?php 
						} 
					?>
				</div>
				<div class="col s1 center-align icons" id="menu">
					<i class="material-icons waves-effect">menu</i>
				</div> 
			</div>
		</div>

		<div class="row item-details" id="item-summary">
			<?php
				include_once('php/item_page_desc.php');
			?>
			<div class="col s12 m10 offset-m1">
				<div class="col s12 m6 " id="item-gallery">
					<div class="row valign-wrapper">
						<div class="col s12 valign">
							<?php echo"<img class='responsive-img' id='image-shown' src='images/itemimages/".$i_id."/1.jpg'>"; ?>
						</div>
					</div>
					<div class="row">
						<ul>
							<?php
								echo "<li class='col s3 item-images'><img class='responsive-img' src='images/itemimages/".$i_id."/1.jpg'></li>";
								if(file_exists("images/itemimages/".$i_id."/2.jpg"))
									echo "<li class='col s3 item-images'><img class='responsive-img' src='images/itemimages/".$i_id."/2.jpg'></li>";
								if(file_exists("images/itemimages/".$i_id."/3.jpg"))
									echo "<li class='col s3 item-images'><img class='responsive-img' src='images/itemimages/".$i_id."/3.jpg'></li>";
								if(file_exists("images/itemimages/".$i_id."/4.jpg"))
									echo "<li class='col s3 item-images'><img class='responsive-img' src='images/itemimages/".$i_id."/4.jpg'></li>";
							?>
						</ul>
					</div>
				</div>
				
				<div class="col m5 offset-m1 s12" id="item-quick-info">
					<p class="" id="item-name"><?php echo $row1['name']; ?></p>
					<p class="" id="seller-info">Seller : <?php echo $row2['s_name']; ?></p>
					<!-- <form class="col s12" action="" method="post"> -->
						<div class=" col s12">
							<p class="green-text text-darken-2" id="item-price">Rs. <?php echo $row1['price']; ?></p>
						</div>
						<div class="col s12 center">
							<button class="btn center green waves-effect waves-light" type="submit" id="add_cart_btn" data-id=<?php echo $i_id; ?> >
								<i class="material-icons left">add_shopping_cart</i>Add to Cart
							</button>
						</div>
					<!-- </form> -->
				</div>
			</div>

		</div>

		<div class="row item-details" id="item-description">
			<div class="col m10 offset-m1 s12">
				<h4 class="bold">Product Description</h4>
				<p><?php echo $row1['description']; ?></p>
			</div>
 		</div>

	</div>

	<footer class="row">
		<div class="col s8 offset-s2">
			<div class="col m4 section">
				<p class="white-text">Overview</p>
				<ul>
					<li><a href="#">About Us</a></li>
					<!-- <li><a href="#">FAQs</a></li> -->
					<li><a href="#">Terms</a></li>
					<!-- <li><a href="#">Privacy</a></li> -->
				</ul>
			</div>
			<div class="col m4 section">
				<p class="white-text">Account</p>
				<ul>
					<li><a href="login.php">Create Account</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="login.php">Edit </a></li>
				</ul>
			</div>
			<div class="col m4 section">
				<p class="white-text">Address</p>
				<ul>
					<li>IIIT Allahabad,</li>
					<li>Jhalwa,</li>
					<li>Allahabad - 211012</li>
				</ul>
			</div>
		</div>
		<p class="col s8 offset-s2">Copyright to us developers</p>
	</footer>


<!-- scripts go here -->
<script src="js/jquery-1.12.2.js"></script>
<script src="js/materialize.js"></script> 
<script src="js/scripts.js"></script>
</body>
</html>