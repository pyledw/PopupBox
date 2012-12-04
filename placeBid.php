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
                                MonthlyRate=:bidAmount, IsMoveInNowBid=:moveInNow

                            WHERE AuctionID='$auctionID' AND ApplicationID='$applicationID'
                            ");
                    try {
                        $stmt->bindValue(':bidAmount',          $amount,                   PDO::PARAM_STR);
                        $stmt->bindValue(':moveInNow',          '0',                       PDO::PARAM_STR);
                        $stmt->execute();
                    } catch (Exception $e) {
                        echo 'Connection failed. ' . $e->getMessage();
                    }
                    header( 'Location: /homeListing.php?listingID='.$propertyID );
                    
                    //send the email to the bidder
                    //get the email
                    $query3 = "select * from USER where Email = '$userID'";
                    $result3 = mysql_query($query3);
                    $row3 = mysql_fetch_array($result3);
                    $username = $row3['UserName'];
                    
                    //get the monthly rate for the email
                    $result4 = mysql_query("select MonthlyRate from BID where AuctionID = '$auctionID'");
                    $row4 = mysql_fetch_assoc($result4);
                    $monthlyRate = $row4['MonthlyRate'];
                    
                    //get the street address for the email
                    $result5 = mysql_query("select Address from PROPERTY where PropertyID = '$propertyID'");
                    $row5 = mysql_fetch_assoc($result5);
                    $streetAdd = $row5['Address'];
                    
                    //get the ending show window 
                    $result6 = mysql_query("select * from AUCTION where AuctionID = '$auctionID'");
                    $row6 = mysql_fetch_array($result6);
                    $endingShow = $row6['DatePFOEndAccept'];
                    $openHouse1 = $row6['DateTimeOpenHouse1'];
                    $moveNowPrice = $row6['RentNowRate'];
                    
                    //compile and send the email
                    $to = $username;
                    $from = "From: noReply@leasehood.com \r\n";
                    $subject = "Thank You for Your Proposal for Occupancy-- $".$monthlyRate." at ".$streetAdd;
                    $mesg = "Dear lessee,\n ".
                        "Your Proposal for Occupancy (PFO) has been submitted and it consists of ".
                        "your application and your proposed monthly rental rate of $".$monthlyRate.". ".
                        "Please note the following important information about ".$streetAdd."\n".
                        "Show Window Ends: ".$endingShow."\n".
                        "Next Open House: ".$openHouse1."\n".
                        "Move-in Now Price: $".$moveNowPrice."/mo \n".
                        "The Show Window can end at any time if the landlord accepts a Move-in-Now PFO.".  
                        "You can modify your PFO at any time.\n".
                        "Should you have any questions, please email us at info@LeaseHood.com.\n".
                        "Regards,\nMark Gardner\nPresident|CEO";
                
                    mail($to, $subject, $mesg, $from);
                    
                    
                    //sending email to landlord
                    //get landlord's email by getting propertyID and finding the email related to it
                    $result7 = mysql_query("select * from PROPERTY where PropertyID = '$propertyID'");
                    $row7 = mysql_fetch_array($result7);
                    $propAssoc = $row7['UserID'];
                    //now get email form USER table by matching userID
                    $result8 = mysql_query("select Email from USER where UserID ='$propAssoc'");
                    $row8 = mysql_fetc_assoc($result8);
                    $landlord = $row8['Email'];
                    
                    
                    //compile and send the landlord email
                    $to2 = $landlord;
                    $from2 = "From: noReply@leasehood.com \r\n";
                    $subject2 = "A Proposal for Occupancy Has Been Submitted -- $".$monthlyRate." at ".$streetAdd;
                    $mesg2 = "Dear landlord,\n ".
                        "<table><tr><td>A Proposal for Occupancy (PFO) has been submitted for your property at ".$streetAdd.". \n</td></tr>".
                        "<tr><td>Please note the following information about your property: \n</tr></td>".
                        "<tr><td>Current PFOs: $".$amount."\n</td></tr>".
                        "<tr><td>Show Window Ends: ".$endingShow."\n</td></tr>".
                        "<tr><td>Next Open House: ".$openHouse1."\n</td></tr>".
                        "<tr><td>Move-in Now Price: $".$moveNowPrice."/mo \n</td></tr>".
                        "<tr><td>  </td></tr><tr><td>The Show Window can end at any time if the landlord accepts a Move-in-Now PFO.".  
                        "You can modify your PFO at any time.\n</td></tr></table>".
                        "Should you have any questions, please email us at info@LeaseHood.com.\n".
                        "Regards,\nMark Gardner\nPresident|CEO";
                
                    mail($to2, $subject2, $mesg2, $from2);
                    
                }
        }
            
?>
