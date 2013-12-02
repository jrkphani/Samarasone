<?
 if($redirect)
	header('Refresh: 5; URL='.base_url("admin")); 
?>
<div class="admin_edit">
	<h1><?=$page;?></h1>
	<form name="form" method="post" action="<?=base_url("admin/edit_contact/$page");?>">
	<div>
	<label>Address </label>
	<textarea class="edit_area" rows="10" cols="20" name="address"><? if(isset($content[0])) echo $content[0];?></textarea>
	</div>
	<div>
	<label>Phone </label>
	<input type="phone" name="phone" id="phone" value="<? if(isset($content[1])) echo $content[1];?>" />
	<label>Fax </label>
	<input type="phone" name="fax" id="fax"value="<? if(isset($content[2])) echo $content[2];?>" />
	<label>Mobile </label>
	<input type="mobile" name="mobile" id="mobile" value="<? if(isset($content[3])) echo $content[3];?>" />
	<label>Email </label>
	<input type="email" name="email" id="email" value="<? if(isset($content[4])) echo $content[4];?>" />
	</div>
	<div class="updated_cancel">
		<input class="admin_btn" id="submit" type="submit" value="Update" />
		<a class="admin_btn" href="<?=base_url("admin");?>">Cancel</a>
	</div>
	</form>
	<p id="message"><?=$msg;?></p>
</div>
<div class="clearall"></div>
<script src="<?php echo base_url($this->config->item('path_js_file').'validation.js');?>"></script>
<script>
$('#submit').click(function(e)
{
	//e.preventDefault();
	//validate('Phone','phone',"","","","","");
	//alert("dffd");
});
</script>