<?php

        include_once 'config.inc.php';
        $con = get_dbconn("");
    
    
        $result = mysql_query("UPDATE IMAGE SET ImageType=0
            WHERE PropertyID=$_GET[propertyID]");

        $result2 = mysql_query("UPDATE IMAGE SET ImageType=1
            WHERE ImageID=$_GET[imageID]");

        if(!$result2)
        {
            die('could not connect: ' .mysql_error());
        }
    
        header( 'Location: /newListing2.php' );
?>
