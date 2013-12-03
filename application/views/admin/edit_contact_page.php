<?
 if($redirect)
	header('Refresh: 5; URL='.base_url("admin")); 
?>
	<div class="admin_edit">
		<h1><?=$page;?></h1>
		<form name="form" method="post" id="myform" action="<?=base_url("admin/edit_contact/$page");?>">
			<div class="admin_contact_container">
				<div class="admin_edit_pg_section2">
					<label class="admin_lbl">Phone </label>
					<input type="phone" name="phone" id="phone" value="<? if(isset($content[1])) echo $content[1];?>" /><br/>
					<label class="admin_lbl">Fax </label>
					<input type="phone" name="fax" id="fax"value="<? if(isset($content[2])) echo $content[2];?>" /><br/>
					<label class="admin_lbl">Mobile </label>
					<input type="mobile" name="mobile" id="mobile" value="<? if(isset($content[3])) echo $content[3];?>" /><br/>
					<label class="admin_lbl">Email </label>
					<input type="email" name="email" id="email" value="<? if(isset($content[4])) echo $content[4];?>" />
				</div>
				<div class="admin_edit_pg_section1">
					<label class="admin_lbl">Address </label><br>
					<textarea class="edit_area admin_cont_txtarea" rows="10" cols="20" name="address"><? if(isset($content[0])) echo $content[0];?></textarea>
				</div>
				<div class="updated_cancel">
					<input class="admin_btn" id="submitbtn"  type="submit" value="Update" />
					<a class="admin_btn" href="<?=base_url("admin");?>">Cancel</a>
					<p id="message"><?=$msg;?></p>
				</div>
			</div>
		</form>
	</div>	
</div>
<div class="clearall"></div>
<div class="push"></div>

<script src="<?php echo base_url($this->config->item('path_js_file').'validation.js');?>"></script>
<script>
$('#submitbtn').click(function(e)
{
	e.preventDefault();

	if(!validate('Phone','phone',false,false,false,type='mobile',disp='message')) return false;
	if(!validate('Fax','fax',false,false,false,type='mobile',disp='message')) return false;
	if(!validate('Mobile','mobile',false,false,false,type='mobile',disp='message')) return false;
	if(!validate('Email','email',false,false,false,type='email',disp='message')) return false;
	
	$('#myform').submit();

});
</script>