$(document).ready(function()
{
	$('#subscribe').click(function(e)
	{
		e.preventDefault();
		if(!validate('Email','Nemail',true,false,false,type='email',disp='msg')) return false;
		$.ajax({
			url:baseurl+"newsletter/addemail",
			type:"POST",
			data: { name: $('#Nname').val(), email: $('#Nemail').val() },
			success:function()
			{
				$('#msg').html("Thank you");
				$('#Nname, #Nemail').val("");
			},
			error:function()
			{
				$('#msg').html("Internal problem, try after some time");
			}
			});
	});
});