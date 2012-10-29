<?php
session_start();
    
    require_once "config.inc.php";
         
    $con = get_dbconn();

    mysql_close();
    
    header( 'Location: /newListing3.php' );
?>
