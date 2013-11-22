<div class="admin_content">
<?php
	echo '<span class="err_msg"'.validation_errors().'</span>';
	if($msg=='suc') echo '<span class="err_msg">Content updated<span>';
	else if($msg=='err') echo '<span class="suc_msg">Content updating failed<span>';
?>
<h2><?php echo 'Edit: '.$title; ?></h2>
<form name="form1" method="post">
<textarea cols="40" rows="10" id="content" name="content">
<?php echo $content; ?>
</textarea>
<input class="admin_submit" type="submit" name="submit" value="Submit" />
</form>
</div>