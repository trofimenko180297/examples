/* RESIZE */
$(document).ready(function() {
	function heightDetect() {
		$(".main_head").css("height", $(window).height());
	};
	heightDetect()
	$(window).resize(function() {
		heightDetect();
	});

$('.popup').magnificPopup({type: 'image' });

/* MENU PICTURE ANIMATE */
$(".toggle_mnu").click(function() {
	$(".sandwich").toggleClass("active");
});

$(".top_mnu ul a").click(function() {
	$(".sandwich").toggleClass("active");
	$(".top_text").removeClass("h_opacity");
	$(".top_mnu li a").removeClass("fadeInUp animated");
	$(".top_mnu li a").addClass("fadeOutDown animated");
	$(".top_mnu").fadeOut(600);
}); 

/* Animate MENU VISIBLE */
$(".toggle_mnu").click(function() {
	if ($(".top_mnu").is(":visible")) {
		$(".top_mnu").fadeOut(600);
		$(".top_text").removeClass("h_opacity");
		$(".top_mnu li a").removeClass("fadeInUp animated");
		$(".top_mnu li a").addClass("fadeOutDown animated");

	} else {
		$(".top_mnu").fadeIn(600);
		$(".top_mnu li a").removeClass("fadeOutDown animated"); 
		$(".top_mnu li a").addClass("fadeInUp animated");
		$(".top_text").addClass("h_opacity");
	}
});

/* ANIMATION */
$(".top_text h1").animated("fadeInDown", "fadeOutUp");
$(".section_header, .top_text p").animated("fadeInUp", "fadeOutDown");
$(".animation_1").animated("flipInY", "flipOutY");
$(".animation_2").animated("fadeInLeft", "fadeOutRight");
$(".animation_3").animated("fadeInRight", "fadeOutLeft");
$(".left .resume_item").animated("fadeInLeft", "fadeOutRight");
$(".right .resume_item").animated("fadeInRight", "fadeOutLeft");

$('.owl-carousel').owlCarousel({
	loop:true,
	margin:50,
	nav:true,
	smartSpeed:1000,
});

});
/* PRELOAD */
$(window).load(function() { 
	$(".loader_inner").fadeOut(); 
	$(".loader").delay(400).fadeOut("slow"); 
});


