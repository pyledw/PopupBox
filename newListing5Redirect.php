<?php
session_start();
    
    require_once "config.inc.php";
         
    $con = get_dbconn("");
    $propertyID = $_SESSION[propertyID];
    
    
    if($row[PageCompleted] != "6")
    {
        
        mysql_query("UPDATE PROPERTY SET PageCompleted='6'
        WHERE PropertyID='$_SESSION[propertyID]'");
    }

    mysql_close();
    
    header( 'Location: /payListingFee.php' );
?>
