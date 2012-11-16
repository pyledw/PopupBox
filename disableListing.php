<?php

/**
 * This page disales the listing with the given listing id in the GET variable.
 * It then returns you back to your myHood page
 */
echo "redirect";
echo $_GET[listingID];

        require_once "config.inc.php";
        //Connecting to the sql database
        $con = get_dbconn("");
        
        $result = mysql_query("UPDATE PROPERTY SET IsApproved='0'
        WHERE PropertyID = '$_GET[listingID]'");

        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        header( 'Location: /myHood.php' );
?>
