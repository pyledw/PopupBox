<?php
session_start();
require "config.inc.php";
         
    $con = mysql_connect($db_server,$db_user,$db_pass );
    if(!$con)
    {
        die('could not connect: ' .mysql_error());
    }
    else
    {
        //echo "connected to mySQL";
    }
    $select = mysql_selectdb($db_database, $con);
    if(!$select)
    {
        die('could not connect: ' .mysql_error());
    }
    else
    {
        //echo "Selected Database";
        
    }
    
    $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='" . $_SESSION[userID] . "'");

        
    $row = mysql_fetch_array($result);
    
    
    mysql_query("UPDATE APPLICATION SET ESignature='$_POST[email]'
    WHERE UserID = '$_SESSION[userID]'");
    
    if($row[PageCompleated] != "6")
    {
        mysql_query("UPDATE APPLICATION SET PageCompleted='6'
            WHERE UserID = '$_SESSION[userID]'");
    }
    
    mysql_close();
    
    header( 'Location: /myHood.php' );
    
?>
