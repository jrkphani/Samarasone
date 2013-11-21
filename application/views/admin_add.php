<h2>Add New Admin</h2>
<div id="err_msg"><?php echo validation_errors(); if($success=='no') echo $msg; ?></div>
<div id="suc_msg"><?php if($success=='yes') echo $msg; ?></div>
<form name="form1" id="form1" method="post" action="">
	<div>
		<span>E-Mail</span>
		<span><input type="text" name="email" id="email" /></span>
	</div>
	<div>
		<span>Password</span>
		<span><input type="text" name="password" id="password" /></span>
	</div>
	<div>
		<span>Confirm Password</span>
		<span><input type="text" name="confirm_password" id="confirm_password" /></span>
	</div>
	<div>
		<span></span>
		<span><input type="submit" name="submit" id="submit" value="Submit" /></span>
	</div>
</form>
<script type="text/javascript" src="<?php echo base_url($this->config->item('path_js_file').'validation.js'); ?>"></script>
<script src="<?php echo base_url($this->config->item('path_js_file').'admin.js');?>"></script>