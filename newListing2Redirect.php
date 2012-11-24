<?php
    /**
     * This redirect page will retrieve all the application info in a form post.
     * 
     * it will then check to see if a property ID was given to it in the form of a session.
     * If session data is found it will create a new property record
     * If session data is found it will update the property ID with teh new data
     * It finally increments the page completed if the property has not already been completed.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */

    session_start();
    
    require_once "config.inc.php";
         
    $con = get_dbconn("");
    
    $result = mysql_query("SELECT * FROM PROPERTY
        WHERE PropertyID='$_SESSION[propertyID]'");
    
     if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
    $row = mysql_fetch_array($result);
    
    echo $row['PageCompleted'];
    
    //Setting which page has been compleated.  If the form has already been compleated it ignors this
    if($row['PageCompleted'] != "6")
    {
        
        mysql_query("UPDATE PROPERTY SET PageCompleted='3'
        WHERE PropertyID='$_SESSION[propertyID]'");
    }

    mysql_close();
    
    header( 'Location: /newListing3.php' );
?>
