<?php

include_once 'imageFunctions.php';
    $con = get_dbconn("");
    
    
        $result4 = mysql_query("UPDATE IMAGE SET ImageType=0
            WHERE PropertyID=$_GET[propertyID]");

        $result4 = mysql_query("UPDATE IMAGE SET ImageType=1
            WHERE ImageID=$_GET[imageID]");

        if(!$result4)
        {
            die('could not connect: ' .mysql_error());
        }
    
        header( 'Location: /newListing2.php' );
?>
