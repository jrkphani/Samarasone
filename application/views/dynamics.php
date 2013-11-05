<div>
<?php
	echo validation_errors();
	if($msg=='suc') echo 'Content updated.';
	else if($msg=='err') echo 'Content updating failed.';
?>
<form name="form1" method="post">
<textarea cols="40" rows="10" name="content">
<?php echo $content; ?>
</textarea>
<input type="submit" name="submit" value="Submit" />
</form>
</div>