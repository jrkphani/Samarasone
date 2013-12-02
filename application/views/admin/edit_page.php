<?
 if($redirect)
	header('Refresh: 5; URL='.base_url("admin")); 
?>
<div class="admin_edit">
	<h1><?=$page;?></h1>
	<form name="form" method="post" action="<?=base_url("admin/edit/$page");?>">
	<textarea id="content" class="edit_area" rows="10" cols="100" name="content"><?=$content;?></textarea>
	<br/>
	<div class="updated_cancel">
		<input class="admin_btn" type="submit" value="Update" />
		<a class="admin_btn" href="<?=base_url("admin");?>">Cancel</a>
	</div>
	</form>
	<p><?=$msg;?></p>
</div>
<div class="clearall"></div>