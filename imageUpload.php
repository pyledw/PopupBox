<?php
include_once 'uploads.inc.php';

$result = array();
if (count($_FILES) > 0)
{
	$result = handle_uploads(4, $_FILES);
	echo "<pre>This is the return value from handle_uploads:";
	print_r($result);
	echo "</pre>";
	echo "<br /><br />";
	echo "THIS DEMONSTRATES HOW TO USE THE RETURN VALUE TO GENERATE IMG TAGS <br />";
	foreach ($result as $upload)
	{
		if (!$upload[error]) 
		{
	?>
			<img src='<?= $upload[name_thumb]; ?>'></img>
	<?
		}
	}
}
?>
