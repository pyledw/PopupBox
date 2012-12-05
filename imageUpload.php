<?php
/**
 * This page takes the image it was given and simply uploads it to the server.  
 * Once it is done it will reroute you back to the newlisting page for image uploads.
 * 
 * @author David Pyle <Pyledw@gmail.com>
 */
session_start();
include_once 'uploads.inc.php';
include_once 'log.inc.php';

$result = array();
if (count($_FILES) > 0)
{
    $result = handle_uploads($_SESSION['propertyID'], $_FILES);
    echo 'files upload';
}


    include_once 'imageFunctions.php';
    $con = get_dbconn("");
    
    echo 'File should have been uploaded';

    $result2 = mysql_query("SELECT * FROM IMAGE WHERE PropertyID='".$_SESSION['propertyID']."' AND ImageType='1'");

    if(!$result2)
        {
			logerror('Problem with query -> result2: ' . mysql_error());
            die('could not connect2: ' .mysql_error());
        }

    if(mysql_num_rows($result2) == 0)
    {
        $result3 = mysql_query("SELECT * FROM IMAGE WHERE PropertyID='".$_SESSION['propertyID']."'");

        if(!$result3)
        {
			logerror('Problem with query ->result3: ' . mysql_error());
            die('could not connect3: ' .mysql_error());
        }

        $row3 = mysql_fetch_array($result3);

        $result4 = mysql_query("UPDATE IMAGE SET ImageType='1' WHERE PropertyID='".$_SESSION['propertyID']."' AND ImageID='".$row3['ImageID']."'");

        if(!$result4)
        {
			logerror('Problem with query -> result4: ' . mysql_error());
            die('could not connect4: ' .mysql_error());
        }
    }
//header( 'Location: /newListing2.php' );
?>
