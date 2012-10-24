<?php
session_start();
    
    require "config.inc.php";
         
    include_once 'config.inc.php';
        //Connecting to the sql database
    $select = get_dbconn();
    
    

    mysql_close();
    
    header( 'Location: /newListing2.php' );
?>
