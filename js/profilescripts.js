$(document).ready(function(){
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
});