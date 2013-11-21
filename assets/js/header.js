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
          pauseOnHover: false,
          restartDelay: 2500,
          effect: "fade"
        }
      });
					});
$(document).ready(function(e) {
	window.menu = 0;
  $('#menu_logo').click(function()
	{
		$('#mainmenu').toggle();
		window.menu = 1;
	});
	$('body').click(function()
	{
		if(window.menu == 1)
		{
			window.menu=0;
		}
		else
		{
			$('#mainmenu').hide();
		} 
	});
	$("#scroller").simplyScroll({pauseOnHover: true});
});