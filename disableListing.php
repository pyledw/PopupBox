<?php

/**
 * This page disales the listing with the given listing id in the GET variable.
 * It then returns you back to your myHood page
 * 
 * @author David Pyle <Pyledw@Gmail.com>
 */
session_start();
if($_SESSION['type'] == '3')
{
echo "redirect";
echo $_GET['listingID'];
echo $_GET['auctionID'];
echo $_GET['userID'];

        require_once "config.inc.php";
        //Connecting to the sql database
        $con = get_dbconn("");
        
        $result = mysql_query("UPDATE PROPERTY SET IsApproved='0',PageCompleted='1'
        WHERE PropertyID = '".$_GET['listingID']."'
            ");
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        $result3 = mysql_query("UPDATE AUCTION
            SET DatePFOEndAccept='date() - 1 Day'
            WHERE AuctionID='".$_GET['auctionID']."'");
        
        if(!$result3)
        {
            die('could not connect3: ' .mysql_error());
        }
        
        /*
         * 
        $result4 = mysql_query("DELETE FROM AUCTION
         
            WHERE AuctionID='".$_GET['auctionID']."'");
        
        if(!$result4)
        {
            die('could not connect4: ' .mysql_error());
        }
        
         * 
         */

        $result2 = mysql_query("UPDATE BID SET IsActive='0'
            WHERE AuctionID='".$_GET['auctionID']."'");
        
        if(!$result2)
        {
            die('could not connect2: ' .mysql_error());
        }
}        
        header( 'Location: /myHood.php' );
        
        //sending email to landlord
        //get propertyID to send email to user
        $auctionID = $_GET['auctionID'];
        $result5 = mysql_query("select PropertyID from AUCTION where AuctionID = '$auctionID'");
        $propertyID = mysql_fetch_assoc($result5);
        
        //associate propertyid to userid and get email
        $result6 = mysql_query("select * from PROPERTY where PropertyID = '$propertyID'");
        $row6 = mysql_fetch_array($result6);
        $userid = $row6['UserID'];
        $streetAdd = $row6['Address'];
        
        $result7 = mysql_query("select Email from USER where UserID = '$userid'");
        $email = mysql_fetch_assoc($result7);
    
        //sending email to account owner
        $to = $email;
        $from = "From: noReply@leasehood.com \r\n";
        $subject = "Your Listing Has Been Removed";
        $mesg = "Dear landlord,\n"."We regret to inform you that your listing for ".$streetAdd." has been 
                    suspended for inappriprite use of  LeaseHood.com's Terms and Conditions.".
                "Should you have any questions, please email us at info@LeaseHood.com.\n".
                "Regards,\n Mark Gardner\n President|CEO";
        
        mail($to, $subject, $mesg, $from);


?>
