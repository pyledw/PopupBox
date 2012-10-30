<?php
session_start();
    
    require_once "config.inc.php";
         
    $con = get_dbconn("");
    $propertyID = $_SESSION[propertyID];
    
    
    

    mysql_close();
    
    header( 'Location: /myHood.php' );
?>
