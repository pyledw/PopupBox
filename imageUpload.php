<?php
include_once 'uploads.inc.php';

$result = array();
if (count($_FILES) > 0)
{
	$result = handle_uploads(4, $_FILES);
	echo 'IMAGE IS UPLOADING';
        
}

header( 'Location: /newListing2.php' );
?>
