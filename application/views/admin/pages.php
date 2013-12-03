	<div class="admin_select_page">
		<p>Please select a page to edit.</p>
		<select class="select_page" autocomplete="off" onchange="gotpage(this.value);">
			<option>Select Page </option>
				<?
				foreach($pages as $page)
				{
					echo "<option class='select_option'>$page</option>";
				}
				?>
		</select>
	</div>
</div>
<div class="push"></div>

<script>
function gotpage(page)
{
	if(page == 'residential_contact' || page == 'commercial_contact' || page == 'business_contact')
	{
		window.location.href = "<?=base_url('admin/edit_contact');?>/"+page;
	}
	else if(page != 'Select Page')
	{
		window.location.href = "<?=base_url('admin/edit');?>/"+page;
	}
}
</script>