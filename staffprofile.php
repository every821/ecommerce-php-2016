<?php 
	require_once('php/staff_check.php');
?>
<!doctype html>
<html>
<head>
	<title>IIITA-Cart</title>
	<link rel="stylesheet" href="css/materialize.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/loginregistrationstyles.css">
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
						<a href="javascript:void(0)" data-target="#products"><i class="hide-on-med-and-down material-icons left">shopping_cart</i>Products</a>
					</li>
					<li class="col s12 nav">
						<a href="javascript:void(0)" data-target="#addproducts"><i class="hide-on-med-and-down material-icons left">add</i>Add product</a>
					</li>
					<li class="col s12 nav">
						<a href="javascript:void(0)" data-target="#statistics"><i class="hide-on-med-and-down material-icons left">equalizer</i>View Statistics</a>
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
							if(file_exists("images/staffprofileimages/".$_SESSION['username'].".jpg")){
								echo '<img src="images/staffprofileimages/'.$_SESSION['username'].'.jpg" class="responsive-img">';
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
					<form action="php/editstaff.php" method="post" enctype="multipart/form-data">
						<div class="col m6 s12 valign-wrapper" id="change-profile-image">
							<input type="file" id="profileimage" name="profileimage">
							<label class="" for="profileimage">
								<?php 
									if(file_exists("images/staffprofileimages/".$_SESSION['username'].".jpg")){
										echo '<img src="images/staffprofileimages/'.$_SESSION['username'].'.jpg" class="responsive-img">';
									}
									else{
										echo '<img src="images/item.png" class="responsive-img">';
									}
								?>
								<!-- <img src="images/item.png" class="responsive-img"> -->
								<p class="center-align">Click to change your photo.</p>
							</label>
						</div>
						<div class="col m5 offset-m1 s12">
							<div class="input-field col s12">
								<input id="name" type="text" class="validate" name="name" value=<?php echo "\"".$_SESSION['name']."\""; ?> required>
								<label for="name">Full Name</label>
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

				<div class="col s12" id="products">
					<h5>Products Added : </h5>
					<?php
						include_once('php/db_connect.php');
						include_once('php/staff_items.php');
						if(mysqli_num_rows($result)==0) {
					?>
							<div class="col s12 valign-wrapper" id="empty-message">
								<i class="material-icons center large ">info_outline</i>
								<h3>
									You have not added any products.
								</h3>
							</div>
					<?php 
						} else {
							for($i=0;$i<sizeof($row);$i++) {
					?>
								<div class="row item-card valign-wrapper-custom" id="item_row">
									<div class="col m1-5 hide-on-small-only item-image">
										<?php echo '<img src="images/itemimages/'.$row[$i]['i_id'].'/1.jpg" class="responsive-img">'; ?>
									</div>
									<div class="col  s12 m3-5 item-info">
										<div class="row">
											<p class="item-name"><?php echo $row[$i]['name']; ?></p>
										</div>
									</div>
									<div class="col m3 s12 item-category">
										<p><?php echo $row[$i]['category']; ?></p>
									</div>
									<div class="col m2 s12 item-price">
										<p class="green-text">Rs. <?php echo $row[$i]['price']; ?></p>
									</div>
									<div class="col m1 s12 delete">
										<?php
											if($row[$i]['available']==1) {
										?>
												<i class="material-icons tooltipped" data-position="left" data-tooltip="Remove item" id="delete_item" data-id=<?php echo $row[$i]['i_id']; ?> >delete</i>
										<?php } ?>
									</div>
								</div>
					<?php				
							}
						}
					?>
				</div>

				<div class="col s12" id="addproducts">	
					<h5>Add a new product: </h5>

					<div class="row item-card valign-wrapper-custom">
						<form class="col s8 offset-s2 center" action="php/add_item.php" method="post" enctype="multipart/form-data">
							<div class="col s12">
								<div class="input-field col m12 s12">
									<input id="itemname" type="text" class="validate" name="itemname" required>
									<label for="itemname">Item name</label>
								</div>
							</div>
							<div class="col s12">
								<div class="input-field col m6 s12">
									<select name="category">
										<option value="Books">Books</option>
										<option value="Electronics">Electronics</option>
										<option value="Others">Others</option>
									</select>
									<label>Select a category</label>
								</div>
								<div class="input-field col m6 s12">
									<input id="price" type="number" class="validate" name="price" required>
									<label for="price">Price</label>
								</div>
							</div>
							<div class="col s12">
								<div class="input-field col s12">
									<textarea id="description" name="description" class="materialize-textarea"></textarea>
									<label for="description">Description</label>
								</div>
							</div>
							
							<div class="col s12" id="image-upload-area">
								<p class="">Item images<small>(At least one is required)</small>:</p>
								<div class="col s2-5 image-upload">
									<input type="file" id="image1" name="image1" required>
									<label class="" for="image1">
										<img src="images/itemDefault.png" class="responsive-img">
										<p class="center-align">#1</p>
									</label>
								</div>
								<div class="col s2-5 image-upload">
									<input type="file" id="image2" name="image2">
									<label class="" for="image2">
										<img src="images/itemDefault.png" class="responsive-img">
										<p class="center-align">#2</p>
									</label>
								</div>
								<div class="col s2-5 image-upload">
									<input type="file" id="image3" name="image3">
									<label class="" for="image3">
										<img src="images/itemDefault.png" class="responsive-img">
										<p class="center-align">#3</p>
									</label>
								</div>
								<div class="col s2-5 image-upload">
									<input type="file" id="image4" name="image4">
									<label class="" for="image4">
										<img src="images/itemDefault.png" class="responsive-img">
										<p class="center-align">#4</p>
									</label>
								</div>
							</div>
							<button class="btn btn-large green waves-effect waves-light" type="submit" name="action">
								Add<i class="material-icons right">send</i>
							</button>
						</form>
					</div>
				</div>
				
				<div class="col s12" id="statistics">
					<h5>Statistics : </h5>
						<?php
							include_once('php/statistics.php');
							if(mysqli_num_rows($result)==0) {
						?>
								<div class="col s12 valign-wrapper" id="empty-message">
									<i class="material-icons center large ">info_outline</i>
									<h3>
										No statistics done yet.
									</h3>
								</div>
						<?php
							} else {
						?>

								<div class="col s12 item-card valign-wrapper-custom" id="item_row">
									<div class="col s12 m6 valign-wrapper">
										<i class = "material-icons medium">equalizer</i>
										<p class="item-name">Products Sold</p>
									</div>
									<div class="col m6 s12">
										<p class="green-text center"><?php echo $row3[0]['count']+$row3[1]['count']+$row3[2]['count']; ?></p>
									</div>
								</div>
								<div class="col s12 item-card valign-wrapper-custom" id="item_row">
									<div class="col s12 m6 valign-wrapper">
										<i class = "material-icons medium">equalizer</i>
										<p class="item-name">Products Added</p>
									</div>
									<div class="col m6 s12">
										<p class="green-text center"><?php echo $row1[0]['count']+$row1[1]['count']+$row1[2]['count']; ?></p>
									</div>
								</div>
								<div class="col s12 item-card valign-wrapper-custom" id="item_row">
									<div class="col s12 m6 valign-wrapper">
										<i class = "material-icons medium">attach_money</i>
										<p class="item-name">Income generated</p>
									</div>
									<div class="col m6 s12">
										<p class="green-text center">Rs. <?php echo $row3[0]['price']+$row3[1]['price']+$row3[2]['price']; ?></p>
									</div>
								</div>

								<div class = "col s12" id = "categorywise-info">
									
									<div class="col m4 s12">
										<i class = "material-icons medium col s12 center-align">library_books</i>
										<div class="col s12 item-card valign-wrapper-custom" id="item_row">
											<div class="col s12 m6 valign-wrapper">
												<i class = "material-icons small">equalizer</i>
												<p class="item-name">Sold</p>
											</div>
											<div class="col m6 s12">
												<p class="green-text center"><?php echo $row3[0]['count']; ?></p>
											</div>
										</div>
										<div class="col s12 item-card valign-wrapper-custom" id="item_row">
											<div class="col s12 m6 valign-wrapper">
												<i class = "material-icons small">equalizer</i>
												<p class="item-name">Added</p>
											</div>
											<div class="col m6 s12">
												<p class="green-text center"><?php echo $row1[0]['count']; ?></p>
											</div>
										</div>
										<div class="col s12 item-card valign-wrapper-custom" id="item_row">
											<div class="col s12 m6 valign-wrapper">
												<i class = "material-icons small">attach_money</i>
												<p class="item-name">Income</p>
											</div>
											<div class="col m6 s12">
												<p class="green-text center">Rs. <?php echo $row3[0]['price']; ?></p>
											</div>
										</div>
									</div>

									<div class="col m4 s12">
										<i class = "material-icons medium col s12 center-align">laptop_chromebook</i>
										<div class="col s12 item-card valign-wrapper-custom" id="item_row">
											<div class="col s12 m6 valign-wrapper">
												<i class = "material-icons small">equalizer</i>
												<p class="item-name">Sold</p>
											</div>
											<div class="col m6 s12">
												<p class="green-text center"><?php echo $row3[1]['count']; ?></p>
											</div>
										</div>
										<div class="col s12 item-card valign-wrapper-custom" id="item_row">
											<div class="col s12 m6 valign-wrapper">
												<i class = "material-icons small">equalizer</i>
												<p class="item-name">Added</p>
											</div>
											<div class="col m6 s12">
												<p class="green-text center"><?php echo $row1[1]['count']; ?></p>
											</div>
										</div>
										<div class="col s12 item-card valign-wrapper-custom" id="item_row">
											<div class="col s12 m6 valign-wrapper">
												<i class = "material-icons small">attach_money</i>
												<p class="item-name">Income</p>
											</div>
											<div class="col m6 s12">
												<p class="green-text center">Rs. <?php echo $row3[1]['price']; ?></p>
											</div>
										</div>
									</div>

									<div class="col m4 s12">
										<i class = "material-icons medium col s12 center-align">shop</i>
										<div class="col s12 item-card valign-wrapper-custom" id="item_row">
											<div class="col s12 m6 valign-wrapper">
												<i class = "material-icons small">equalizer</i>
												<p class="item-name">Sold</p>
											</div>
											<div class="col m6 s12">
												<p class="green-text center"><?php echo $row3[2]['count']; ?></p>
											</div>
										</div>
										<div class="col s12 item-card valign-wrapper-custom" id="item_row">
											<div class="col s12 m6 valign-wrapper">
												<i class = "material-icons small">equalizer</i>
												<p class="item-name">Added</p>
											</div>
											<div class="col m6 s12">
												<p class="green-text center"><?php echo $row1[2]['count']; ?></p>
											</div>
										</div>
										<div class="col s12 item-card valign-wrapper-custom" id="item_row">
											<div class="col s12 m6 valign-wrapper">
												<i class = "material-icons small">attach_money</i>
												<p class="item-name">Income</p>
											</div>
											<div class="col m6 s12">
												<p class="green-text center">Rs. <?php echo $row3[2]['price']; ?></p>
											</div>
										</div>
									</div>

								</div>



								<table class="col s12 responsive-table">
									<thead>
										<tr>
											<th data-field="row-num">#</th>
											<th data-field= "product-name">Product Name</th>
											<th data-field="buyer-name">Buyer Name</th>
											<th data-field="order-date">Order Date</th>
										</tr>
									</thead>
									<tbody>
						<?php
								for($i=0;$i<sizeof($row);$i++) {
									echo	"<tr>
												<td>". ($i+1) ."</td>
												<td>". $row[$i]['name'] ."</td>
												<td>". $row[$i]['m_name'] ."</td>
												<td>". $row[$i]['order_date'] ."</td>
											</tr>";
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