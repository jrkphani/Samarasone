<form name="form" method="post">
Current Password <input type="password" name="current_password" id="current_password" />
New Password <input type="password" name="new_password" id="new_password" />
Confirm Password <input type="password" name="confirm_password" id="confirm_password" />
<input type="submit" name="submit" value="Update" />
</form>
<a  href="<?if(isset($_SERVER['HTTP_REFERER'])) echo $_SERVER['HTTP_REFERER']; else echo base_url(); ?>"> Cancle </a>