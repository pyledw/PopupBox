<?php
session_start();
    
    require_once "config.inc.php";
         
    $con = get_dbconn("");
    
    if($row[PageCompleted] != "6")
    {
        
        mysql_query("UPDATE PROPERTY SET PageCompleted='3'
        WHERE PropertyID='$_SESSION[propertyID]'");
    }

    mysql_close();
    
    header( 'Location: /newListing3.php' );
?>
