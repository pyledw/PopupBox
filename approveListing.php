

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
            "<tr><td>*If you receive any Move-in-Now PFOs, you must respond to them within 48 hours.  
                Otherwise they will be withdrawn without obligation.\n</td></tr>".
            "<tr><td>*The Show Period is the time frame in which your property will solicit PFOs.  You may end the 
                Show Period at any time if you accept a PFO, including a Move-in-Now PFO, or if you have not 
                received any PFOs. \n</td></tr>".
            "<tr><td>*After the Show Period expires, and if you have received at least one PFO, you must either Accept or Reject the PFO(s) within 24 hours.  
                This allows applicants to submit PFOs for other properties should you reject their PFO for your property. \n</td></tr>".
            "<tr><td>*It is suggested you maintain contact with your personal email account during the duration 
                of the Show Period in the event you receive Move-in-Now PFOs. \n</td></tr>".
            "<tr><td>*Your keys dates are: </td></tr>".
                "<tr><td>Property Being Pre-Marketed? </td><td> ".$preMarket."</td></tr>";
                "<tr><td>Beginning of Show Period: </td><td> ".$datePFOAccept."</td></tr>";
                "<tr><td>First Open House: </td><td> ".$dateTimeOpenHouse1."</td></tr>";
                "<tr><td>Second Open House: </td><td> ".$dateTimeOpenHouse2."</td></tr>";
                "<tr><td>End of Show Period: </td><td> ".$datePFOEndAccept."</td></tr>\n";
            "Should you have any questions, please email us at info@LeaseHood.com.\n</table>".
            "Regards,\nMark Gardner\nPresident|CEO";
                
         mail($to, $subject, $mesg, $from);
        
?>
