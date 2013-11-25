<?
 if($redirect)
	header('Refresh: 5; URL='.base_url("admin")); 
?>
<h1><?=$page;?></h1>
<form name="form" method="post" action="<?=base_url("admin/edit/$page");?>">
<textarea rows="10" cols="100" name="content"><?=$content;?></textarea>
<br/>
<input type="submit" value="update" />
<a href="<?=base_url("admin");?>">Cancel</a>
</form>
<p><?=$msg;?></p>