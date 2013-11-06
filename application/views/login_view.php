<div class="left_form">
	<div class="left_form_inner">
		<div class="clearboth"></div>
		<!-- login functionality -->
		<div id="form_sig" <? if($register=='register')	{ echo 'style="display:none;"'; } ?>>
			<?php /* if($session_data = $this->session->userdata('logged_in')) { ?>
				<div>
					<p>Howdy! <?php echo $session_data['firstname']; ?>&nbsp|&nbsp
						<a href="<?php echo base_url('profile'); ?>">Profile</a>&nbsp|&nbsp
						<?php if($session_data['role']=='user') { ?>
							<a href="<?php echo base_url('home'); ?>">Resume</a>&nbsp|&nbsp
						<?php } else if($session_data['role']=='member') { ?>
							<a href="<?php echo base_url('member/searchresume'); ?>">Search</a>&nbsp|&nbsp
							<a href="<?php echo base_url('member/selectedResume'); ?>">Selected Resume</a>&nbsp|&nbsp
						<?php } else if($session_data['role']=='admin') { ?>
							<a href="<?php echo base_url('admin'); ?>">User List</a>&nbsp|&nbsp
						<?php } ?>
						<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
					</p>
				</div>
				<?php } else { */ ?>
			<div >
				
				<form>
					<div>
						<input type="text"  class="login" placeholder="Email" id="username" name="username">
						<span class="login"><input type="checkbox" id="c1" class="form_checkbox" /><span class="rem_pad">Remember me</span></span>
            <label for="c1">
            </label>
					</div>
					<div>
						<input type="password" class="login" placeholder="Password" id="passowrd" name="password">
						<h3 class="forget" style="display:none;">Its easy to change your password<br><br></h3>
						<div class="forget" style="display:none;">Please enter your email address here:<br><br></div>
						<input type="text"  class="forget" placeholder="Email" id="fusername" name="fusername" style="display:none;">
						<span id="forget" class="login" >Forgot Password?</span>
						<span id="back_to_login" class="forget clickr" style="display:none;">Cancel</span>
					</div>
					<span id="error_msg" ></span><br><br>
						<div>
							<span class="clickr login" id="loginsubmit" >Sign in</span>
				    		<span class="clickr forget" id="forgetsubmit" style="display:none;">Submit</span>
						</div>
			    </form>
			</div>		
			<?php /* } */ ?>
		</div>
		<div id="form_reg" <? if($register!='register')	{ echo 'style="display:none;"'; } ?>>
			<h2>New to Resume Builder? Sign Up </h2>
			<form id="registration_form">
				<p class="scus-msg"></p>
				<label for="firstname">First name <span class="red">*</span></label>
			    <input type="text" name="firstname" id="firstname" placeholder="First name" value="<?php echo $sess_user_detail['user_detail']['first_name']; ?>" />
				<span class="error_msg" id="firstname_err1"></span>
				<label  for="lastname">Last name <span class="red">*</span></label>
			    <input type="text" name="lastname" id="lastname" placeholder="Last name" value="<?php echo $sess_user_detail['user_detail']['last_name']; ?>" />
			 	<span class="error_msg" id="lastname_err1"></span>
			 	<label  for="inputEmail">Email <span class="red">*</span></label>
			   	<input type="email" class="email_check" name="email_address" id="inputEmail" placeholder="Email" value="<?php echo $sess_user_detail['user_detail']['secondary_email']; ?>" />
			    <span class="error_msg" id="email_err1"></span>
			    <label  for="inputPassword">Password <span class="red">*</span></label>
			    <input type="password"  name="pass_word" id="inputPassword" placeholder="Password">
			    <span class="error_msg" id="password_err1"></span>
			    <label>Refer friends</label>
			 	<table class="reg_tr_remove" id="friends_tb">
			 		<input type="hidden" id="friend_count" value="2" />
			 		<input type="hidden" id="friend_id" value="2" />
				  	<tr>
				  		<td>Friend 1:</td>
				  		<td>&nbsp<input type="email" name="friend_email[]" class="email_check friend_emails" /></td>
				  		<td></td>
				  	</tr>
				  	<tr>
				  		<td>Friend 2:</td>
				  		<td>&nbsp<input type="email" name="friend_email[]" class="email_check friend_emails" /></td>
				  		<td></td>
				  	</tr>
				</table>
				<div id="add_friend">Add</div><br /><br />
				 
				 <div class="captcha_img1"><span id="captcha_img"></span><span id="getcaptcha" class="cap_get1">&nbsp;</span></div>
				 <input class="captcha_txt" type="text" id="inputCaptcha" name="captcha"/>
				 <div>
				 	Register as:&nbsp;&nbsp;<input type="radio" name="role" id="role" value="user" checked="checked" />User&nbsp;&nbsp;
				 	<input type="radio" name="role" id="role" value="member" />Member
				 </div>
				<div class="error_msg" id="error_msg1"></div>
				<br>
				<span class="clickr" id="signupsubmit">Sign Up</span>
			</form>
		</div>
	</div>	
</div>

</div>
</div>

<script type="text/javascript" src="<?php echo base_url($this->config->item('path_js_file').'validation.js'); ?>"></script>
<script src="<?php echo base_url($this->config->item('path_js_file').'jquery.cookie.js');?>"></script>
<script src="<?php echo base_url($this->config->item('path_js_file').'login.js');?>"></script>
