if ( DYN_WEB.Scroll_Div.isSupported() ) {
	
	DYN_WEB.Event.domReady( function() {
		
		// arguments: id of scroll area div, id of content div
		var wndo = new DYN_WEB.Scroll_Div('wn', 'lyr1');
		// see info online at http://www.dyn-web.com/code/scrollers/continuous/documentation.php
		wndo.makeSmoothAuto( {axis:'h', bRepeat:true, repeatId:'rpt1', speed:40, bPauseResume:true} );
    
	});
}
$('.hreflink').click(function(){
	window.location.href=$(this).attr('href');
	});