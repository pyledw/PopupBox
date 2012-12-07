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
                
                echo ' AMT ->'.$amount;
                
                $result = mysql_query("SELECT ApplicationID FROM APPLICATION
                    WHERE UserID = '$userID'");
                
                $row = mysql_fetch_array($result);

                $applicationID = $row['ApplicationID'];

                echo " appID ->" .$applicationID;
                
                $result = mysql_query("SELECT * FROM BID
                    WHERE ApplicationID='$applicationID' AND IsActive='1'");
                
                if(!$result)
                    {
                        die('could not connect: ' .mysql_error());
                    }
                
                if(mysql_num_rows($result) != '0')
                {
                    
                    $bidID = mysql_fetch_array($result);
                    //Using the new method for inserting into the Database
                    $con = get_dbconn("PDO");
                    $stmt = $con->prepare("
                            UPDATE BID SET
                                MonthlyRate=:bidAmount,
                                IsMoveInNowBid=:moveInNow
                               
                            WHERE IsActive='1' AND BidID='$bidID[BidID]'
                            ");
                    try {
                        $stmt->bindValue(':bidAmount',          $amount,                   PDO::PARAM_STR);
                        $stmt->bindValue(':moveInNow',          '1',                       PDO::PARAM_STR);
                        $stmt->execute();
                    } catch (Exception $e) {
                        echo 'Connection failed. ' . $e->getMessage();
                    }
                    //header( 'Location: /homeListing.php?listingID='.$propertyID );
                    
                    
                }
                else
                {
                    mysql_query("INSERT INTO BID (AuctionID,ApplicationID,MonthlyRate,IsMoveInNowBid,IsActive)
                        VALUES
                        ('$auctionID','$applicationID','$amount','1','1')");
                }


                
                
                header( 'Location: /myHood.php ' );
                
                    //send the email to the bidder
                    //get the email
                    $result3 = mysql_query("select Email from USER where Email = '$userID'");
                    $email = mysql_fetch_assoc($result3);
                    
                    
                    //get the monthly rate for the email
                    $result4 = mysql_query("select MonthlyRate from BID where AuctionID = '$auctionID'");
                    $monthlyRate = mysql_fetch_assoc($result4);
                    
                    //get the ending show window 
                    $result6 = mysql_query("select * from AUCTION where AuctionID = '$auctionID'");
                    $row6 = mysql_fetch_array($result6);
                    $endingShow = $row6['DatePFOEndAccept'];
                    $openHouse1 = $row6['DateTimeOpenHouse1'];
                    $moveNowPrice = $row6['RentNowRate'];
                    $propertyID = $row6['PropertyID'];
                    
                    //get the street address for the email
                    $result5 = mysql_query("select Address from PROPERTY where PropertyID = '$propertyID'");
                    $streetAdd = mysql_fetch_assoc($result5);
                    
                    //compile and send the email
                    $to = $email;
                    $from = "From: noReply@leasehood.com \r\n";
                    $subject = "A Move-in-now PFO Has Been Submitted -- Please Respond ASAP $".$monthlyRate." at ".$streetAdd;
                    $mesg = "Dear landlord,\n ".
                        "A Move-in-Now Proposal for Occupancy (PFO) has been submitted for your property at ".$streetAdd.". ".
                        "The landlord will have 48 hours from the submission of your PFO to accept or reject your PFO.  If you do ".
                        "not receive notice from the landlord within 48 hours, you will be relieved from your Move-in-Now ".
                        "PFO obligations and free to submit a PFO for another property.  Please note the following ".
                        "information: ".$endingShow."\n".
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
                        "<tr><td>By ".$endingShow.", you must either accept or reject the PFO or the applicant will be relieved 
                            of his obligations and free to submit a PFO for another property. Please <a href='http://199.115.231.216'>login</a> to accept or reject this PFO.\n</tr></td>".
                        "Should you have any questions, please email us at info@LeaseHood.com.\n</table>".
                        "Regards,\nMark Gardner\nPresident|CEO";
                
                    mail($to2, $subject2, $mesg2, $from2);
        }


?>
