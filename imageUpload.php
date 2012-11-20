<?php
/**
 * This page takes the image it was given and simply uploads it to the server.  
 * Once it is done it will reroute you back to the newlisting page for image uploads.
 * 
 * @author David Pyle <Pyledw@gmail.com>
 */
session_start();
include_once 'uploads.inc.php';

$result = array();
if (count($_FILES) > 0)
{
	$result = handle_uploads($_SESSION[propertyID], $_FILES);
	echo 'IMAGE IS UPLOADING';
        
}

header( 'Location: /newListing2.php' );
?>
