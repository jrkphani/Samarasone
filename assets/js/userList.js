//javascript file
var user_id,do_action,user_email;

$(document).ready(function(){
	//Activate or block users
	function ActivateOrBlock()
	{
		id=window.user_id;
		action=window.do_action;
		email=window.user_email;
		
		if(action=='block')	//get reason for blog
		{
			var msg=$('#dialog_message').val();
			if(!msg.trim())
			{
				alert("The message cannot be empty.");
				return false;
			}
		}
		$.ajax({
			url: baseurl+'admin/activateUser/'+id+'/'+action+'/'+email,
			type:'POST',
			data: {'msg':msg},
			dataType: 'json',
			success:function(data){
				if(data.resultset.success==1)
				{
					/*if(action=='activate')
					{
						$('#statusDiv'+id).html('Active');
						$('#actionDiv'+id).html('<a href="javascript:void(0);" class="actOrBlock" doAct="block" data="'+id+'" >Block</a>')
					}
					else if(action=='block')
					{
						$('#statusDiv'+id).html('Blocked');
						$('#actionDiv'+id).html('<a href="javascript:void(0);" class="actOrBlock" doAct="activate" data="'+id+'" >Activate</a>')
					}*/
					if(data.resultset.mail=='no')
						alert("Mail not send to user.");

					$.ajax({
						url: baseurl+'admin/userListAjax/',
						type:'POST',
						data: $('#form1').serialize(),
						dataType: 'html',
			            success:function(result)
			            {
			            	$('#ajax-content').html(result);
			            },
			            error:function()
			            {
			                alert('Internal error, Please try agian!');
			            }
					})
				}
				else
				{
					alert('Internal error, Please try agian!');
				}
			},
			error:function()
			{
				alert('Internal error, Please try agian!');
			}
		})
	}

	//Shorting
	$('#role,#status').change(function(){
		$.ajax({
			url: baseurl+'admin/userListAjax/',
			type:'POST',
			data: $('#form1').serialize(),
			dataType: 'html',
            success:function(result)
            {
            	$('#ajax-content').html(result);
            },
            error:function()
            {
                alert('Internal error, Please try agian!');
            }
		})
	});

	/*$( "#dialog_box" ).dialog({ 
		autoOpen: false,
		modal: true,
		buttons: [ { text: "Send Mail", click: function() { if(ActivateOrBlock()!=false) $( this ).dialog("close"); } }, 
		{ text: "Cancel", click: function() { $( this ).dialog("close"); } } ]
	});*/

	$('.actOrBlock').click(function(){
		window.user_id=$(this).attr('data');
		window.user_email=encodeURIComponent($(this).attr('mailAdd'));
		var action=$(this).attr('doAct');
		window.do_action=action;

		if(action=='block')
			$("#dialog_box").dialog("open");
		else
			ActivateOrBlock();
	});

	 $('#form1').submit(function(){
	 	//validate(Title,ElementID,Mandatory(true/false),MaxLength(Number/false),MinLength(Number/false),Type=(string/email/number/mobile/false),Display(DisplayID/false));
        if(!validate('Primary Email','email',man=true,max=254,min=false,type='email')) return false;
	 	var email=$.trim($("#email").val());
    });
});

function serialize_form()
{
     return $('#form1').serialize();
}