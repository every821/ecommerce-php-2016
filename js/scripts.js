$(document).ready(function(){
	$('select').material_select();
	// hover changes on items
	$(".case .item").hover(
		function(){
			$(this).find("button").fadeToggle("fast");
		},
		function(){
			$(this).find("button").fadeToggle("fast");
		}
	);

	$(".case .item button").on("click",function(e){
		e.preventDefault();
	});	

	$accountOpts = $("#account-opts");
	$accountOpts.hide();
	$("div#account").on("click",function(){
		$accountOpts.fadeToggle("slow");
	});

	// login page
	$chooseRegistration=$("#chooseForRegistration");
	$("a#registerHere").on("click",function(){
		$("#login").fadeOut("slow").promise().done(function(){
			$chooseRegistration.fadeIn("fast");
		});
	});
	$chooseRegistration.find("#customer").on("click",function(){
		$.ajax({
			url : "ajaxmodules/memberRegistration.php",
			success: function(result){
				console.log(result);
				var regForm=result;
				$chooseRegistration.fadeOut("slow").promise().done(function() {
					console.log(regForm);
					$("#form-container").append(regForm);
				});
			}
		});
	});

	$chooseRegistration.find("#staff").on("click",function(){
		$.ajax({
			url : "ajaxmodules/staffRegistration.php",
			success: function(result){
				console.log(result);
				var regForm=result;
				$chooseRegistration.fadeOut("slow").promise().done(function() {
					console.log(regForm);
					$("#form-container").append(regForm);
				});
			}
		});
	});

	// item page
	$targetImage=$("img#image-shown");
	$images=$("li.item-images").find("img");

	$images.on("click",function(){
		$targetSrc=$(this).attr("src");
		console.log($targetSrc);
		$targetImage.attr("src",$targetSrc);
	});

	// scripts for navbar
	(function() {

		var $container = $("div#page"),
			$triggerBtn = $("div#menu"),
			$overlay = $("div.overlay"),
			$closeBtn = $("span.overlay-close");

		function toggleOverlay() {
			if( $overlay.hasClass("open") ) {
				$overlay.removeClass("open");
				$container.removeClass("overlay-open");
				$overlay.addClass("close");
			}
			else {
				$overlay.addClass("open");
				$container.addClass("overlay-open");
			}
		}

		$triggerBtn.on("click", toggleOverlay );
		$closeBtn.on("click", toggleOverlay );
	})();

	// profile scripts
	var $tabs = $("#current-content > div"),
		$menuListAnchors = $("#profile-menu ul li a"),
		$profileTab = $("#profile #profile-wrapper"),
		$editProfile = $("#profile-options a"),
		$cancelEditProfile = $("#editprofile a#cancel-editing");

	$tabs.hide();
	updateContent();

	$menuListAnchors.on("click",function(){
		$menuListAnchors.closest("li").removeClass("active");
		$(this).closest("li").addClass("active");
		updateContent();
	});

	function updateContent(){
		$targetId = $("#profile-menu ul li.active a").attr("data-target");
		$("#current-content > div.active").fadeOut("fast").promise().done(function(){
			$($targetId).addClass("active").fadeIn();
		});
	}

	$(":file").change(function(e){
		$img = $(this).parent().find("label img");
		if(this.files){
			var reader = new FileReader();
			reader.onload = function(e){
				$img.attr("src",e.target.result);
			}
			reader.readAsDataURL(this.files[0]);
		}		
	});


	$editProfile.on("click",function(){
		$("#profile").fadeOut("fast").promise().done(function(){
			$("#editprofile").fadeIn();
		});
	});

	$cancelEditProfile.on("click",function(){
		$("#editprofile").fadeOut("fast").promise().done(function(){
			$("#profile").fadeIn();
		});
	});

	// add item to cart
	$(document).on('click', '#buy-btn, #add_cart_btn', function() {
		item_id = $(this).attr('data-id');
		$.ajax({
			url: "php/add_to_cart.php",
			method: "post",
			data: {id: item_id},
			success: function(response) {
				console.log(response);
				if(response==2) {
					cart_items_no = $('#cart_items_no').html();
					cart_items_no++;
					$('#cart_items_no').html(cart_items_no);
					Materialize.toast('Item added to cart.', 3000);
				}
				else if(response==1)
					Materialize.toast('Item already in cart.', 3000);
				else 
					Materialize.toast('Login as member.', 3000);
			}
		})
	});

	// delete product item
	$(document).on('click', '#delete_item', function() {
		item = $(this);
		item_id = item.attr('data-id');
		$.ajax({
			url: "php/delete_from_staff.php",
			method: "post",
			data: {id: item_id},
			success: function(response) {
				item.closest('#item_row').remove();
				if($("#item_row").lenght==0) {
					$("#products").append("<div class='col s12 valign-wrapper' id='empty-message'><i class='material-icons center large '>info_outline</i><h3>You have not added any products.</h3></div>");
				}
			}
		})
	});

	// delete cart item
	$(document).on('click', '#delete_item_cart', function() {
		item = $(this);
		item_id = item.attr('data-id');
		$.ajax({
			url: "php/delete_from_cart.php",
			method: "post",
			data: {id: item_id},
			success: function(response) {
				item.closest('.item_row').remove();
				if($("#item_row").lenght==0) {
					$('#cart').append("<div class='col s12 valign-wrapper' id='empty-message'><i class='material-icons center large '>info_outline</i><h3>Your shopping bag seems empty. <br>Go add some.</h3></div>");
				}
			}
		})
	});

	// empty cart
	$(document).on('click', '#empty_cart', function() {
		item = $(this);
		$.ajax({
			url: "php/empty_cart.php",
			method: "post",
			success: function(response) {
				$('.item_row').remove();
				$('#cart').append("<div class='col s12 valign-wrapper' id='empty-message'><i class='material-icons center large '>info_outline</i><h3>Your shopping bag seems empty. <br>Go add some.</h3></div>");
			}
		})
	});

	// invoice redirect
	$(document).on('click', "#purchases tr", function() {
		window.location = 'invoiceTemplate.php?id='+ $(this).attr("data-id");
	});

	// print invoice
	$("button#print-button").on("click",function(){
		window.print();
	});
});