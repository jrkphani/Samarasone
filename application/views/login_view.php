<div class="admin_login">
	<form>
		<h2 class="admin_h2">Admin Login</h2>
		<div>
			<input class="addmin_txt" type="text"  class="login" placeholder="Email" id="username" name="username">
			<span class="login"><input type="checkbox" id="c1" class="form_checkbox" /><span class="rem_pad">Remember me</span></span>
			<label for="c1"></label>
		</div>
		<div>
			<input class="addmin_txt" type="password" class="login" placeholder="Password" id="passowrd" name="password">
			<h3 class="forget" style="display:none;">Its easy to change your password<br><br></h3>
			<div class="forget" style="display:none;">Please enter your email address here:<br><br></div>
			<input type="text"  class="forget addmin_txt" placeholder="Email" id="fusername" name="fusername" style="display:none;">
			<span id="forget" class="login" >Forgot Password?</span><br>
			<span class="admin_btn" id="back_to_login" class="forget clickr" style="display:none;">Cancel</span>
		</div>
		<span class="admin_error_msg"  id="error_msg" style="margin: 0!important; font-size: 14px; color: red;" ></span><br><br>
		<div>
			<span class="clickr login admin_btn" id="loginsubmit" >Sign in</span>
			<span class="clickr forget admin_btn" id="forgetsubmit" style="display:none;">Submit</span>
		</div>
	</form>
</div>
<script type="text/javascript" src="<?php echo base_url($this->config->item('path_js_file').'validation.js'); ?>"></script>
<script src="<?php echo base_url($this->config->item('path_js_file').'jquery.cookie.js');?>"></script>
<script src="<?php echo base_url($this->config->item('path_js_file').'login.js');?>"></script>
