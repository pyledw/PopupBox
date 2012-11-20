<?php

    /**
     * This page will delete the selected image from the server and database.
     * 
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
?>
