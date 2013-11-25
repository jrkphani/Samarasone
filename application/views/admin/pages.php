<?php
echo '</p>Please select a page to edit.<p><select autocomplete="off" onchange="gotpage(this.value);">';
echo "<option>Select Page</<option>";
foreach($pages as $page)
{
	echo "<option>$page</<option>";
}
echo "</select>";
?>
<script>
function gotpage(page)
{
	if(page != 'Select Page')
	window.location.href = "<?=base_url('admin/edit');?>/"+page;
}
</script>