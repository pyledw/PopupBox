<?php
    session_start();
    if(isset($_SESSION[userID]))
        {
            if($_SESSION[type] == "1")
            {
                $userID = $_POST[userID];
                $propertyID = $_POST[propertyID];
                $auctionID = $_POST[auctionID];
                $amount = $_POST[amt];
                

                include_once 'config.inc.php';
                //Connecting to the sql database
                $con= get_dbconn("");

                $result = mysql_query("SELECT * FROM APPLICATION
                    WHERE UserID = '$userID'");

                $row = mysql_fetch_array($result);

                $applicationID = $row[ApplicationID];
                echo $auctionID . " " . $applicationID;
                $result = mysql_query("SELECT * FROM BID
                    WHERE AuctionID='$auctionID' AND ApplicationID='$applicationID'");
                
               echo mysql_num_rows($result);
               while($row = mysql_fetch_array($result))
               {
                   echo $row[MonthlyAmount];

               }
               
               if(mysql_num_rows($result) == 0)
               {
                    mysql_query("INSERT INTO BID (AuctionID,ApplicationID,MonthlyRate)
                    VALUES
                    ('$auctionID','$applicationID','$amount')");


                    //header( 'Location: /homeListing.php?listingID='.$propertyID );
                }
            }
        }
            
?>
