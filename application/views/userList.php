<div id="ajax-content">
<div class="row-fluid">
	<div class="span12">
		<form name="form1" id="form1">

		<table cellpadding="7" border="1">
			<tr>
				<td>ID</td>
                <td>Email</td>
                <td>Status</td>
            </tr>
			<?php if(count($userlist)==0) echo '<tr><td colspan="3">No records to display.</td></tr>';
			else { foreach ($userlist as $user) {?>
			<tr>
				<td><?php echo $user->id; ?></td>
                <td><?php echo $user->email; ?></td>
                <td id="statusDiv<?php echo $user->id; ?>"><?php if($user->active=='1') echo 'Active'; elseif ($user->active=='-1') echo 'Blocked'; else echo 'Pending'; ?></td>
            </tr>
			<?	} } ?>
		</table>
		<div class="pagi"><?php echo $pagi; ?></div>
		</form>
	</div>
</div>


</div>

<script src="<?php echo base_url($this->config->item('path_js_file').'userList.js');?>"></script>