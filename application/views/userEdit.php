<div id="file_upload" style="display:none;">
   <form method="post" action="" id="upload_file">
     <label for="userfile">File</label>
     <input type="file" name="userfile" id="userfile" size="20" value=""/>
     <input type="submit" name="submit" id="fsubmit" value="Upload"/>
   </form>
</div>
<div class="row-fluid">
	<div class="span12">
    	<span class="err-msg"><?php echo validation_errors(); if(@$error) echo @$error['error'];  ?></span>
    	<?php $attributes = array('name' => 'form1', 'id' => 'form1'); echo form_open('admin/editUser/'.$id,$attributes); ?>
    	<table>
        <input type="hidden" name="user_id" id="user_id" value="<? echo $id; ?>" />
            <tr>
                <td>Primary Email</td>
                <td>
					<input type="text" name="email" id="email" value="<? echo $email; ?>" /></td>
            </tr>
            <tr>
                <td>Role</td>
                <td>
					<input type="radio" name="role" value="user" <?php if($role=='user') { ?> checked="checked" <?php } ?> />User&nbsp;&nbsp;
                    <input type="radio" name="role" value="member" <?php if($role=='member') { ?> checked="checked" <?php } ?> />Member&nbsp;&nbsp;
                    <input type="radio" name="role" value="admin" <?php if($role=='admin') { ?> checked="checked" <?php } ?> />Admin
                </td>
            </tr>
            <tr>
                <td></td><td><input type="submit" value="Update" name="submit_form1" /></td>
            </tr>
            </table>
            <?php echo form_close(); ?>
	</div>
</div>
<script src="<?php echo base_url($this->config->item('path_js_file').'validation.js');?>"></script>
<script src="<?php echo base_url($this->config->item('path_js_file').'userList.js');?>"></script>