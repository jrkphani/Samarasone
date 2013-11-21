$(document).ready(function(){

	$('#submit').click(function(){
		if(!validate('Email','email',man=true,max=100,min=false,type='email',disp='err_msg')) return false;
		else if(!validate('Password','password',man=true,max=100,min=6,type=false,disp='err_msg')) return false;
		else if(!validate('Confirm Password','confirm_password',man=true,max=100,min=6,type=false,disp='err_msg')) return false;
		else if(!same('Password','Confirm Password','password','confirm_password',disp='err_msg')) return false;
	});

	
});