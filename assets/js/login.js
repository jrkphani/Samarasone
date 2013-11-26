$(document).ready(function()
{
	/*
	getcaptcha();
	$('#getcaptcha').click(function(){
		  $('#captcha_img').html('loading...');
		   getcaptcha();
		  });*/
		  
	// If username avail of browser cookie, show it.
	var username=$.cookie("username");
	if(username!=undefined)
		$("#username").val(username);

	// Show forgotpassword option and hide login option
	$('#forget').click(function(){
		$('.login').hide();
		$('.forget').show();
		$('#admin_error_msg').html("");
	});

	// Show login option and hide forgotpassword option
	$('#back_to_login').click(function(){
		$('.login').show();
		$('.forget').hide();
		$('#admin_error_msg').html("");
	});

	// Submit signin when press enter on input fields
	$('#username , #passowrd').keypress(function(e) 
	{
		if(e.which == 13) 
		{
			$('#loginsubmit').click();
		}
	});

	// Submit login form
	$('#loginsubmit').click(function()
	{
		$('#admin_error_msg').html("");
		var email = $.trim($('#username').val());
		var password = $('#passowrd').val();
		if(!validate('Email','username',man=true,max=254,min=false,type='email',disp='admin_error_msg')) return false;
		else if(!validate('Password','passowrd',man=true,max=30,min=6,type='false',disp='admin_error_msg')) return false;
		else
		{
			if($('#c1').is(':checked'))
			{
				$.cookie("username", email, { expires: 365 }); // Remember username for 1 year
			}
			
			$.ajax(
			{
				url:baseurl+'verifylogin',
				type:'POST',
				data:{'username':email,'password':password},
				dataType: 'json',
				success:function(data)
				{
					if(data.resultset.success=='yes')
					{
							window.location.href=baseurl+"admin";
					}
					else
					{
						$('#admin_error_msg').html(data.resultset.errors);	
					}
				},
				error:function()
				{
					$('#admin_error_msg').html('Internal error, try agian...');
				}
			});
		}
	});

	// Submit forgot password form
	$('#forgetsubmit').click(function()
	{
		$('#admin_error_msg').html("");
		var email = $.trim($('#fusername').val());
		if(!validate('Email','fusername',man=true,max=254,min=false,type='email',disp='admin_error_msg')) return false;
		else
		{
			$.ajax(
			{
				url:baseurl+'forget',
				type:'POST',
				data:{'username':email},
				dataType: 'json',
				success:function(data)
				{
					if(data.resultset.success=='yes')
					{
						$('#admin_error_msg').html("<span class='success_msg'>We have sent you an email to reset the password. Please check your mail account.</span>");
						//alert('s');
						//window.location.reload();
						//window.location.href="tmplts";
					}
					else
					{
						$('#admin_error_msg').html(data.resultset.errors);	
					}
				},
				error:function()
				{
					$('#admin_error_msg').html("Internal error, try agian...");
				}
			});
		}
	});
});

/*
function getcaptcha()
  {
	$.ajax({
			url:baseurl+"captcha",
			data: $('#contactForm').serialize(),
			dataType:"JSON",
			type:"POST",
			success: function(result)
			{
				$('#captcha_img').html(result.resultset.captcha.image);
				result.resultset.captcha.image
				result.resultset.captcha.word
			},
			error: function()
			{
				$('#msg_disp').text('Intenal error, try again !');
			}
		});
 }*/