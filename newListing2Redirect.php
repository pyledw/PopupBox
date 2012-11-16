<?php
session_start();
    
    require_once "config.inc.php";
         
    $con = get_dbconn("");
    
    $result = mysql_query("SELECT PageCompleted FROM PROPERTY
        WHERE PropertyID='$propertyID'");
    
     if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
    $row = mysql_fetch_array($result);
    
    echo $row[PageCompleted];
    
    //Setting which page has been compleated.  If the form has already been compleated it ignors this
    if($row[PageCompleted] != "6")
    {
        
        mysql_query("UPDATE PROPERTY SET PageCompleted='3'
        WHERE PropertyID='$_SESSION[propertyID]'");
    }

    mysql_close();
    
    header( 'Location: /newListing3.php' );
?>
