<?php

    /**
     * This page will delete the selected image from the server and database.
     * 
     * It will get the data and unlink it from the server.
     * It will then delete the row from the database.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    $_GET[imageID];
    
    echo $_GET[imageID];
    
    include 'config.inc.php';
    
    $con = get_dbconn("");
    
    $image = mysql_query("SELECT * FROM IMAGE
            WHERE ImageID=$_GET[imageID]");
        
    $row = mysql_fetch_array($image);
        
    unlink($row[ImagePathOriginal]);
    unlink($row[ImagePathThumb]);
        
        
        
    $result = mysql_query("DELETE FROM IMAGE
        WHERE ImageID=$_GET[imageID]");

    if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        
    echo 'This will eventually be a function to delete the listing.'; 
    
    header( 'Location: /newListing2.php' );
?>
