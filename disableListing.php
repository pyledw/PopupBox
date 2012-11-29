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


?>
