<?php 
	require_once('php/user_check.php');
?>
<!doctype html>
<html>
<head>
	<title>IIITA-Cart</title>
	<link rel="stylesheet" href="css/materialize.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/userstaffstyles.css">
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
				<div class="col s1 offset-s11 center-align icons" id="menu">
					<i class="material-icons waves-effect">menu</i>
				</div> 
			</div>
		</div>

		<div class="row" id="user-profile">
			
			<div class="col s2" id="profile-menu">
				<!-- <p class="center-align">Menu</p> -->
				<ul class="col s12">
					<li class="col s12 nav active">
						<a href="javascript:void(0)" data-target="#profile"><i class="hide-on-med-and-down material-icons left">perm_identity</i>Profile</a>
					</li>
					<li class="col s12 nav">
						<a href="javascript:void(0)" data-target="#cart"><i class="hide-on-med-and-down material-icons left">shopping_cart</i>Cart</a>
					</li>
					<li class="col s12 nav">
						<a href="javascript:void(0)" data-target="#purchases"><i class="hide-on-med-and-down material-icons left">assignment</i>Purchases</a>
					</li>
					<li>
						<form action="php/logout.php" class="left">
							<button type="submit" value="logout" class="btn waves-effect waves-light">Log out</button>
						</form>
					</li>
				</ul>
			</div>
			
			<div class="col s10" id="current-content">
				<div class=" col s12 active" id="profile">
					<div class="col s3" id="profile-options">
						<div class="col s6 offset-s6 center">
							<a href="javasript:void(0)" class="valign-wrapper btn green waves-effect waves-light">
								<i class="material-icons tooltipped hide-on-large-only" data-tooltip="Edit Profile">edit</i>
								<span class="hide-on-med-and-down">Edit Profile</span>
							</a>
						</div>
					</div> 
					<div class="col m6 s12 valign-wrapper" id="profile-image">
						<?php 
							if(file_exists("images/userprofileimages/".$_SESSION['username'].".jpg")){
								echo '<img src="images/userprofileimages/'.$_SESSION['username'].'.jpg" class="responsive-img">';
							}
							else{
								echo '<img src="images/item.png" class="responsive-img">';
							}
						?>	
						<!-- <img src="images/item.png" class="valign responsive-img"> -->
					</div>
					<div class="col m5 offset-m1 s12" id="profile-details">
						<div class="col s12">
							<h6>Name : </h6>
							<p><?php echo $_SESSION['name']; ?></p>
						</div>
						<div class="col s12">
							<h6>Username : </h6>
							<p><?php echo $_SESSION['username']; ?></p>
						</div>
						<div class="col s12">
							<h6>Email -id : </h6>
							<p><?php echo $_SESSION['email']; ?></p>
						</div>
						<div class="col s12">
							<h6>Phone no : </h6>
							<p><?php echo $_SESSION['phone']; ?></p>
						</div>
						<div class="col s12">
							<h6>Shipping Address : </h6>
							<p><?php echo $_SESSION['address']; ?></p>
						</div>
					</div>
				</div>
				
				<div class=" col s12 active" id="editprofile">
					<a id="cancel-editing" href="javascript:void(0)" class="btn-floating btn-large red waves-effect waves-light">
						<i class="material-icons">clear</i>
					</a>
					<p class="center-align">Edit details</p>
					<form class="" action="php/edituser.php" method="post" enctype="multipart/form-data">
						<div class="col m6 s12 valign-wrapper" id="change-profile-image">
							<input type="file" id="profileimage" name="profileimage">
							<label class="" for="profileimage">
								<?php 
									if(file_exists("images/userprofileimages/".$_SESSION['username'].".jpg")){
										echo '<img src="images/userprofileimages/'.$_SESSION['username'].'.jpg" class="responsive-img">';
									}
									else{
										echo '<img src="images/item.png" class="responsive-img">';
									}
								?>	
								<!-- <img src="images/item.png" class="responsive-img"> -->
								<p class="center-align">Click to change your photo.</p>
							</label>
						</div>
						<div class="col m5 offset-m1 s12" action="" method="post">
							<div class="input-field col s12">
								<input id="name" type="text" class="validate" name="name" value=<?php echo "\"".$_SESSION['name']."\""; ?> required>
								<label for="name">Full name</label>
							</div>
							<div class="input-field col m6 s12">
								<input id="email" type="email" class="validate" name="email" value=<?php echo $_SESSION['email']; ?> required>
								<label for="email">Email-id</label>
							</div>
							<div class="input-field col m6 s12">
								<input id="phone" type="text" class="validate" name="phone" value=<?php echo $_SESSION['phone']; ?> required>
								<label for="phone">Phone</label>
							</div>
							<div class="input-field col m6 s12">
								<input id="oldpassword" type="password" class="validate" name="oldpassword" required>
								<label for="oldpassword">Old password</label>
							</div>
							<div class="input-field col m6 s12">
								<input id="newpassword" type="password" class="validate" name="newpassword" required>
								<label for="newpassword">Password</label>
							</div>
							<div class="input-field col s12">
								<textarea id="address" name="address" required class="materialize-textarea"><?php echo $_SESSION['address']; ?></textarea>
								<label for="address">Address</label>
							</div>
							<button class="btn green waves-effect waves-light" type="submit" name="action">
								Submit<i class="material-icons right">send</i>
							</button>
						</div>
					</form>
				</div>

				<div class="col s12" id="cart">
					<h5>Cart Items : </h5>

					<?php
						include_once('php/db_connect.php');
						include_once('php/show_cart_items.php');
						if(mysqli_num_rows($result)==0) {
					?>
							<div class="col s12 valign-wrapper" id="empty-message">
								<i class="material-icons center large ">info_outline</i>
								<h3>
									Your shopping bag seems empty. <br>Go add some.
								</h3>
							</div>
					<?php 
						} else {
					?>
							<div class="col s3" id="cart-options">
								<div class="col s6 center">
									<button class="valign-wrapper btn green waves-effect waves-light" id="empty_cart">
										<i class="material-icons tooltipped hide-on-large-only" data-tooltip="Empty Cart">remove</i>
										<span class="hide-on-med-and-down">Empty Cart</span>
									</button>
								</div>
								<form class="col s6 center" method="post" action="php/order.php">
									<button class="valign-wrapper btn green waves-effect waves-light" id="confirm_order">
										<i class="material-icons tooltipped hide-on-large-only" data-tooltip="Confirm Order">send</i>
										<span class="hide-on-med-and-down">Confirm order</span>
									</button>
								</form>
							</div>
					<?php
							for($i=0;$i<sizeof($row);$i++) {
					?>
								<div class="row item-card valign-wrapper-custom item_row">
									<div class="col m1-5 hide-on-small-only item-image">
										<?php echo '<img src="images/itemimages/'.$row[$i]['i_id'].'/1.jpg" class="responsive-img">'; ?>
									</div>
									<div class="col  s12 m3-5 item-info">
										<div class="row">
											<p class="item-name"><?php echo $row[$i]['name']; ?></p>
											<p class="hide-on-small-only"><?php echo $row[$i]['description']; ?></p>
										</div>
									</div>
									<div class="col m2 s12 item-category">
										<p><?php echo $row[$i]['category']; ?></p>
									</div>
									<div class="col m2 s12 seller-info">
										<p><?php echo $_SESSION['username']; ?></p>
									</div>
									<div class="col m2 s12 item-price">
										<p class="green-text">Rs. <?php echo $row[$i]['price']; ?></p>
									</div>
									<div class="col m1 s12 delete">
										<i class="material-icons tooltipped" data-position="left" data-tooltip="Remove item" id="delete_item_cart" data-id=<?php echo $row[$i]['i_id']; ?> >delete</i>
									</div>
								</div>
					<?php				
							}
						}
					?>
				</div>
				
				<div class="col s12" id="purchases">
					<h5>Purchase history : </h5>

					<?php
						include_once('php/db_connect.php');
						include_once('php/purchase.php');
						if(mysqli_num_rows($result)==0) {
					?>
							<div class="col s12 valign-wrapper" id="empty-message">
								<i class="material-icons center large ">info_outline</i>
								<h3>
									No purchases so far.
								</h3>
							</div>
					<?php 
						} else {
					?>
							<table class="responsive-table">
									<thead>
										<tr>
											<th data-field="row-num">Order ID</th>
											<th data-field= "product-name">Product Name</th>
											<th data-field="seller-name">Seller Name</th>
											<th data-field="order-date">Order Date</th>
											<th data-field="delivery-date">Delivery Date</th>
											<th data-field="price">Price</th>
										</tr>
									</thead>
									<tbody>
					<?php
							$i = 0;
							for($j=0;$j<sizeof($row1);$j++) {
								$k = $i+$row1[$j]['count'];
								$flag = 0;
								for(;$i<$k;$i++) {
									if($row[$i]['delivery_date']==NULL)
										$row[$i]['delivery_date'] = "Not Delivered";
									echo"<tr data-id = ".$row[$j]['o_id'].">";
									if($flag!=1)
										echo"<td rowspan=". $row1[$j]['count'] .">". $row[$j]['o_id'] ."</td>";
									echo"	<td>". $row[$i]['name'] ."</td>
											<td>". $row[$i]['s_name'] ."</td>
											<td>". $row[$i]['order_date'] ."</td>
											<td>". $row[$i]['delivery_date'] ."</td>
											<td>". $row[$i]['price'] ."</td>
										</tr>";
									$flag = 1;
								}
							}
					?>
							</tbody>
								</table>
					<?php
						}
					?>
				</div>

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