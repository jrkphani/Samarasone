// JavaScript Document
jQuery(function($) {
		$("#slides").slidesjs({
		 width: 100,
		 height: 100,
         play: {
          active: true,
          auto: true,
          interval: 4000,
          swap: true,
          pauseOnHover: true,
          restartDelay: 2500,
          effect: "fade"
        }
      });
					});
$(document).ready(function(e) {
  $('#menu_logo').click(function()
	{
		$('#mainmenu').toggle();
	});
});
$(document).ready(function(){
	$("#scroller").simplyScroll({pauseOnHover: true});
});