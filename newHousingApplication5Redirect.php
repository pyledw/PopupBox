<?php
session_start();

    include_once 'config.inc.php';
        //Connecting to the sql database
    $connectionInfo= get_dbconn();
    $con = $connectionInfo[0];
    $select = $connectionInfo[1];
    
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
