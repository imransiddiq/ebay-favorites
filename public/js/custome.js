// Menu Function
jQuery(document).ready(function () {
	jQuery('nav').meanmenu();
});	

//==========================================


// Scroll To Top
jQuery(document).ready(function() {
	var offset = 220;
	var duration = 500;
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > offset) {
			jQuery('.scrollup').fadeIn(duration);
			} 
			else {
				jQuery('.scrollup').fadeOut(duration);
			}
		});
		
	jQuery('.scrollup').click(function(event) {
	event.preventDefault();
	jQuery('html, body').animate({scrollTop: 0}, duration);
	return false;
	});


});
//==========================================

$(".item").click(function(){
	$(".no_bits_outer").toggleClass("move_left");
	$(".contact_outer").toggleClass("move_left");
	
	$(".pushy").toggleClass("move_width");
});

// Show Social Share Icon
$('.socialShareRow').hide();
$('.socialShareIcon').click(function() {
	$(this).closest('.row').find('.socialShareRow').fadeToggle(500);
	console.log('clicked');
});
