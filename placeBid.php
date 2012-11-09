<?php
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
                echo $auctionID . " " . $applicationID . " " . $amount;
               $result2 = mysql_query("SELECT * FROM BID
                    WHERE AuctionID='$auctionID' AND ApplicationID='$applicationID'");
                
               echo $numRows = mysql_num_rows($result2);
               
               while($row2 = mysql_fetch_array($result2))
               {
                   

               }
               
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
