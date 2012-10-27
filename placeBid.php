<?php
    session_start();
    if(isset($_SESSION[userID]))
        {
            $userID = $_POST[userID];
            $propertyID = $_POST[propertyID];
            
            include_once 'config.inc.php';
            //Connecting to the sql database
            $connectionInfo= get_dbconn();
            $con = $connectionInfo[0];
            $select = $connectionInfo[1];
        
        
            mysql_query("INSERT INTO BID (UserID,Address)
            VALUES
            ('$_SESSION[userID]','$_POST[address]')");
            
            
            header( 'Location: /homeListing.php?listingID='.$propertyID );
        }
        else
        {
            header( 'Location: /searchResults.php');
        }
?>
