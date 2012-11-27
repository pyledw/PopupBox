<?php
/**
     * This page is the page that actially sends the bid data to the database.
     * it checks to see if a user has an active bid on this listing, and then
     * it will either update the old bid, or create a new one.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     * 
     */

    session_start();
    if(isset($_SESSION['userID']))
        {

                $auctionID = $_GET['auctionID'];
                $userID = $_SESSION['userID'];
                

                include_once 'config.inc.php';
                //Connecting to the sql database
                $con= get_dbconn("");

                $result = mysql_query("SELECT RentNowRate FROM AUCTION
                    WHERE AuctionID = '$auctionID'");
                
                $row = mysql_fetch_array($result);
                
                $amount = $row['RentNowRate'];
                
                echo $amount;
                
                $result = mysql_query("SELECT ApplicationID FROM APPLICATION
                    WHERE UserID = '$userID'");
                
                $row = mysql_fetch_array($result);

                $applicationID = $row[ApplicationID];
                
                mysql_query("INSERT INTO BID (AuctionID,ApplicationID,MonthlyRate,IsMoveInNowBid,IsActive)
                    VALUES
                    ('$auctionID','$applicationID','$amount','1','1')");


                
                
                header( 'Location: /myHood.php ' );
        }


?>
