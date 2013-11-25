<h1><?=$page;?></h1>
<form name="form" method="post" action="<?=base_url("admin/edit/$page");?>">
<textarea name="content"><?=$content;?></textarea>
<br/>
<input type="submit" value="update" />
<a href="<?=base_url("admin");?>">Cancel</a>
</form>
<p><?=$msg;?></p>