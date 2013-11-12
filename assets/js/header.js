// JavaScript Document
jQuery(function($) {
						$(".touchslider").touchSlider({mouseTouch: true, autoplay: true, delay: 3000});
					});
$(document).ready(function(e) {
  $('#menu_logo').click(function()
	{
		$('#mainmenu').toggle();
	});
});