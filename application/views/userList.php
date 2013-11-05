<div id="ajax-content">
<div class="row-fluid">
	<div class="span12">
		<form name="form1" id="form1">
		<table border="1">
			<tr style="padding:2px 0">
				<td>Role</td>
				<td>
					<select name="role" id="role">
						<option value="" <?php if($role==NULL) echo 'selected="selected"' ?>>All</option>
						<option value="user" <?php if($role=='user') echo 'selected="selected"' ?>>User</option>
						<option value="member" <?php if($role=='member') echo 'selected="selected"' ?>>Member</option>
					</select>
				</td>
				<td>Status</td>
				<td>
					<select name="status" id="status">
						<option value="" <?php if($status==NULL) echo 'selected="selected"' ?>>All</option>
						<option value="1" <?php if($status=='1') echo 'selected="selected"' ?>>Active</option>
						<option value="pending" <?php if($status=='pending') echo 'selected="selected"' ?>>Pending</option>
						<option value="-1" <?php if($status=='-1') echo 'selected="selected"' ?>>Block</option>
					</select>
				</td>
			</tr>
		</table>

		<table cellpadding="7" border="1">
			<tr>
				<td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Role</td>
                <td>Status</td>
                <td>Edit</td>
                <td>Action</td>
            </tr>
			<?php if(count($userlist)==0) echo '<tr><td colspan="3">No records to display.</td></tr>';
			else { foreach ($userlist as $user) {?>
			<tr>
				<td><?php echo $user->id; ?></td>
                <td><?php echo $user->first_name.' '.$user->last_name; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->role; ?></td>
                <td id="statusDiv<?php echo $user->id; ?>"><?php if($user->active=='1') echo 'Active'; elseif ($user->active=='-1') echo 'Blocked'; else echo 'Pending'; ?></td>
                <td><a href="<?php echo base_url('admin/editUser/'.$user->id); ?>">Edit</a></td>
                <?php /* ?><td id="actionDiv<?php echo $user->id; ?>">
                	<?php if($user->active=='1') echo '<a href="javascript:void(0);" class="actOrBlock" mailAdd="'.$user->email.'" doAct="block" data="'.$user->id.'">Block</a>';
                	else echo '<a href="javascript:void(0);" class="actOrBlock" mailAdd="'.$user->email.'" doAct="activate" data="'.$user->id.'">Activate</a>'; ?>
                </td>
                <?php */ ?>
            </tr>
			<?	} } ?>
		</table>
		<div class="pagi"><?php echo $pagi; ?></div>
		</form>
	</div>
</div>

<div id="dialog_box" style="background-color: #CCCCFF; display:none;">
	<table cellpadding="5">
	    <tr>
	        <td><strong>Message to User</strong></td>
	    </tr>
	    <tr>
	        <td><textarea id="dialog_message"></textarea></td>
	    </tr>
	</table>
</div>

</div>

<script type="text/javascript" src="http://localhost/samaras/assets/js/userList.js"></script>