<?php
    session_start();
    if(isset($_SESSION[userID]))
        {
            $userID = $_POST[userID];
            $propertyID = $_POST[propertyID];
            $amount = $_POST[amt];
            
            include_once 'config.inc.php';
            //Connecting to the sql database
            $connectionInfo= get_dbconn();
            $con = $connectionInfo[0];
            $select = $connectionInfo[1];
        
            $result = mysql_query("SELECT * FROM APPLICATION
                WHERE UserID = '$userID'");
            
            $row = mysql_fetch_array($result);
            
            $applicationID = $row[ApplicationID];
            
            mysql_query("INSERT INTO BID (AuctionID,ApplicationID,MonthlyRate)
            VALUES
            ('$_SESSION[userID]','$applicationID','$amount')");
            
            
            header( 'Location: /homeListing.php?listingID='.$propertyID );
        }
        else
        {
            header( 'Location: /searchResults.php');
        }
?>
