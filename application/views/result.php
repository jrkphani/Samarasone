<?php

include 'search.php'; ?>
<h2>Search Result</h2>
<div>
<?php foreach ($result2 as $row2) { ?>
			<p><?php echo $row2->headline; ?></p><br />
			<?php echo $row2->suburb.'<br />'.$row2->price; ?><br /><br />
			<?php echo $row2->description; ?><br /><br />
<?php } ?>
</div>