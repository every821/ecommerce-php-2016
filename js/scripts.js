$(document).ready(function(){

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

	// scripts for navbar
	(function() {

		var $container = $("div#page"),
			$triggerBtn = $("p#menu"),
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

});