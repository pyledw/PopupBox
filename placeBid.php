<?php

    /**
     * This page is the page that actially sends the bid data to the database.
     * it checks to see if a user has an active bid on this listing, and then
     * it will either update the old bid, or create a new one.
     */
    session_start();
    if(isset($_SESSION[userID]))
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
                echo $auctionID . "+" . $applicationID . "+" . $amount;
               $result2 = mysql_query("SELECT * FROM BID
                    WHERE AuctionID='$auctionID' AND ApplicationID='$applicationID'");
                
               echo $numRows = mysql_num_rows($result2);
               
               while($row2 = mysql_fetch_array($result2))
               {
                   

               }
               echo $applicationID;
               if($numRows == 0)
               {
                    mysql_query("INSERT INTO BID (AuctionID,ApplicationID,MonthlyRate)
                    VALUES
                    ('$auctionID','$applicationID','$amount')");


                    header( 'Location: /homeListing.php?listingID='.$propertyID );
                }
                else
                {
                    //Using the new method for inserting into the Database
                    $con = get_dbconn("PDO");
                    $stmt = $con->prepare("
                            UPDATE BID SET
                                MonthlyRate=:bidAmount

                            WHERE AuctionID='$auctionID' AND ApplicationID='$applicationID'
                            ");
                    try {
                        $stmt->bindValue(':bidAmount',          $amount,                   PDO::PARAM_STR);
                        $stmt->execute();
                    } catch (Exception $e) {
                        echo 'Connection failed. ' . $e->getMessage();
                    }
                    header( 'Location: /homeListing.php?listingID='.$propertyID );
                }
        }
            
?>
