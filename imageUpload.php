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
include 'config.inc.php';

$con = get_dbconn("");

$result2 = mysql_query("SELECT * FROM IMAGE
    WHERE PropertyID=$_SESSION[propertyID] AND Type='1'");

if(mysql_num_rows($result2) == 0)
{
    $result3 = mysql_query("SELECT * FROM IMAGE
    WHERE PropertyID=$_SESSION[propertyID]");
    
    $row3 = mysql_fetch_array($result3);
    
    mysql_query("UPDATE IMAGE SET Type=1
        WHERE PropertyID=$_SESSION[propertyID] AND ImageID=$row3[ImageID]");
}



header( 'Location: /newListing2.php' );
?>
