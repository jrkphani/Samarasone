//javascript file

//validate(Title,ElementID,Mandatory(true/false),MaxLength(Number/false),MinLength(Number/false),Type=(string/email/number/mobile/false),Display(DisplayID/false));
//function validate(title,id,mandatory=false,max_length=false,min_length=false,type=false,display=false)
function validate(title,id,mandatory,max_length,min_length,type,display)
{
	mandatory = (mandatory === undefined) ? false : mandatory;
	max_length = (max_length === undefined) ? false : max_length;
	min_length = (min_length === undefined) ? false : min_length;
	type = (type === undefined) ? false : type;
	display = (display === undefined) ? false : display;

	var data=document.getElementById(id).value.trim();
	
	if(!data && mandatory==true)
	{
		var msg=title+" cannot be empty.";
		if(!display)
			alert(msg);
		else
			document.getElementById(display).innerHTML=msg;
		document.getElementById(id).focus();
		return false;
	}
	if(max_length)
	{
		if(data.length>max_length)
		{
			var msg=title+' is too long.';
			if(!display)
				alert(msg);
			else
				document.getElementById(display).innerHTML=msg;
			document.getElementById(id).focus();
			return false;
		}
	}
	if(min_length)
	{
		if(data.length<min_length)
		{
			var msg=title+' required minimum '+min_length+' character length.';
			if(!display)
				alert(msg);
			else
				document.getElementById(display).innerHTML=msg;
			document.getElementById(id).focus();
			return false;
		}
	}
	if(type=='string' && data)
	{
		var format = /^[a-zA-Z ]+$/;
		if(!data.match(format))
		{
			var msg=title+' can contain letters and space only.';
			if(!display)
				alert(msg);
			else
				document.getElementById(display).innerHTML=msg;
			document.getElementById(id).focus();
			return false;
		}
	}
	else if(type=='number' && data)
	{
		var format = /^[0-9]+$/;
		if(!data.match(format))
		{
			var msg=title+' can be a number only.';
			if(!display)
				alert(msg);
			else
				document.getElementById(display).innerHTML=msg;
			document.getElementById(id).focus();
			return false;
		}
	}
	else if(type=='email' && data)
	{
		var format = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!data.match(format))
		{
			var msg=title+' is invalid.';
			if(!display)
				alert(msg);
			else
				document.getElementById(display).innerHTML=msg;
			document.getElementById(id).focus();
			return false;
		}
	}
	else if(type=='mobile' && data)
	{
		var format = /^[0-9 \-\+]+$/;
		if(!data.match(format))
		{
			var msg=title+' cannot contain alphabets or special characters only.';
			if(!display)
				alert(msg);
			else
				document.getElementById(display).innerHTML=msg;
			document.getElementById(id).focus();
			return false;
		}
	}
	return true;
}

//Match two fields and If matched return true, else return false.
function same(title1,title2,id1,id2,display)
{
	var data1=document.getElementById(id1).value.trim();
	var data2=document.getElementById(id2).value.trim();
	display = (display === undefined) ? false : display;

	if(data1!=data2)
	{
		var msg=title1+' and '+title2+' are missmatched.';
		if(!display)
			alert(msg);
		else
			document.getElementById(display).innerHTML=msg;
		return false;
	}
	else
		return true;
}