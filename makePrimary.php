<?php
        /**
         * This page will retireve the image id, and set the selected image as the 
         * primary after it sets all images of the property as non primary.
         * 
         * @author David Pyle <Pyledw@Gmail.com>
         */
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
