

<?php

/** 
 * This page is for if a administrator chooses to approve a listing.
 * The data is moved to the auction field so the listing will go live.
 * This creates the actual auction row in the AUCTION table
 * 
 * @author David Pyle <Pyledw@Gmail.com>
 */

echo "redirect";

require_once "config.inc.php";
        //SQL connection information


	$con = get_dbconn("");

        $result = mysql_query("SELECT * FROM PROPERTY
            WHERE PropertyID = '$_POST[propertyID]'");
        
        $row = mysql_fetch_array($result);
        $propertyID = $row['PropertyID'];
        $dateAvailable = $row['DateAvailable'];
        $datePFOAccept = $row['DatePFOAccept'];
        $datePFOEndAccept = $row['DatePFOEndAccept'];
        $dateTimeOpenHouse1 = $row['DateTimeOpenHouse1'];
        $dateTimeOpenHouse2 = $row['DateTimeOpenHouse2'];
        $startingBid = $row['StartingBid'];
        $minBidIncrement = $row['MinBidIncrement'];
        $requiredDeposit = $row['RequiredDeposit'];
        $rentNowRate = $row['RentNowRate'];
        $minimumTerm = $row['MinimumTerm'];
        $preMarket = $row['PreMarket'];
        
        
        mysql_query("INSERT INTO AUCTION (PropertyID,DateAvailable,DatePFOAccept,DatePFOEndAccept,DateTimeOpenHouse1,DateTimeOpenHouse2,StartingBid,MinBidIncrement,RequiredDeposit,RentNowRate,MinimumTerm,PreMarket)
        VALUES
        ('$propertyID','$dateAvailable','$datePFOAccept','$datePFOEndAccept','$dateTimeOpenHouse1','$dateTimeOpenHouse2','$startingBid','$minBidIncrement','$requiredDeposit','$rentNowRate','$minimumTerm','$preMarket')");
        
        mysql_query("UPDATE PROPERTY SET IsApproved='1'
        WHERE PropertyID = '$_POST[propertyID]'");
        
        header( 'Location: /myHood.php' );
        
        //email for landlord
        //set the query to get the email address from ApplicationID 
        
         //get landlord's email by getting propertyID and finding the email related to it
         $result0 = mysql_query("select * from PROPERTY where PropertyID = '$_POST[propertyID]'");
         $row0 = mysql_fetch_array($result0);
         $propAssoc = $row0['UserID'];
         
         //now get email form USER table by matching userID
         $result1 = mysql_query("select Email from USER where UserID ='$propAssoc'");
         $row1 = mysql_fetc_assoc($result1);
         $landlord = $row1['Email'];
        
        
        //compile and send the email
        $to = $landlord;
        $from = "From: noReply@leasehood.com \r\n";
        $subject = "Property Listing Approval";
        $mesg = "Dear landlord,\n ".
            "Congratulations.  Your property listing has been approved! ".
            "To help make your experience with LeaseHood more enjoyable and successful, please note the following tips: \n<table>".
            "<tr><td>*Some landlords require a monthly income of 4 times the monthly rental rate.\n</td></tr>".
            "<tr><td>*Consider saving several homes and searches.  By doing so, you can automatically be emailed important messages about the properties. \n</td></tr>".
            "<tr><td>*Please note that the Proposal for Occupancy (PFO) is package that consists of your proposed rental rate and the information 
                in your application.  It is very important that your application contains accurate information since it will likely 
                be verified by the landlord before the lease agreement is presented to you for approval. \n</td></tr>".
            "<tr><td>*After you submit a PFO, you can change the proposed rental rate at any time or mae changes to your application. \n</td></tr>".
            "<tr><td>*Only one PFO can be submitted at a time.</td></tr>".
            "<tr><td>*If your PFO is not selected, you may then submit a PFO for another property free 
                of charge for 30 days.\n</td></tr>".
            "Should you have any questions, please email us at info@LeaseHood.com.\n</table>".
            "Regards,\nMark Gardner\nPresident|CEO";
                
         mail($to, $subject, $mesg, $from);
        
?>
