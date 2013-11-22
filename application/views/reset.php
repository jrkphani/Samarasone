<link rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."sss_resume.css"); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."sss_login.css"); ?>" />
<div class="form_title">
	<h3>Reset your password</h3>
</div>

	
<div class="left_form_feedback">
	<span>In order to verify your password, please enter it in the field below and re-enter it in the next field. A good password should contain capital and lower case letters, numbers as well as symbols.</span><br><br>
<div class="container">
		<div class="download-main">
			<div class="download-main-inner">
				<span style="color:#ff0000; font-size:14px; position:absolute; margin:22px 0 0 204px;"><?php echo $error; ?></span>
				<br>
				<br>
				<form action="<?php echo base_url('forget/activation'); ?>" method="POST">
        <table>
        	<tr style="border:none;">
       		 <td>
           	<label class="pr_left1">Enter New Password: </label>
           </td>
           <td>
            <input style="margin-left:20px;" type="password" placeholder="Password" id="passowrd" name="password">
           </td>
         </tr>
         <tr style="border:none;">
         <td>
         	<label class="pr_left1">Re-enter New Password: </label>
         </td>
         <td>
         	<input style="margin-left:20px;" type="password" placeholder="Confirm Password" id="cpassowrd" name="cpassword">
         </td>
        </tr>
       </table>
  					 <input type="hidden" value="<?php echo $forget; ?>" name="acode">
				     <input type="submit" id="restsubmit" class="fb_btn" style="cursor:pointer;" value="Submit" />
             
             
				</form>
			</div> 
			
		</div>
		
	</div>
</div>
