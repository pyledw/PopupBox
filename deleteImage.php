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
        
    
    

    $result2 = mysql_query("SELECT * FROM IMAGE
        WHERE PropertyID='$_SESSION[propertyID]' AND ImageType=1");

    if(!$result2)
        {
            die('could not connect: ' .mysql_error());
        }
    
    if(mysql_num_rows($result2) == 0)
    {
        echo mysql_num_rows($result2);
        $result3 = mysql_query("SELECT * FROM IMAGE
        WHERE PropertyID='$_SESSION[propertyID]'");

        if(!$result3)
        {
            die('could not connect: ' .mysql_error());
        }

        $row3 = mysql_fetch_array($result3);

        $result4 = mysql_query("UPDATE IMAGE SET ImageType=1
            WHERE PropertyID='$_SESSION[propertyID]' AND ImageID='$row3[ImageID]'");

        if(!$result4)
        {
            die('could not connect: ' .mysql_error());
        }
    }
        
        
    echo 'This will eventually be a function to delete the listing.'; 
    
    //header( 'Location: /newListing2.php' );
?>
