<?php
    /**
     * This file contains functions to be used on the my hood page.
     * 
     * These included a funciton to manage the 36 hour limit to holding
     * bids after the listing. It will also contain any otehr fucntions that
     * are based off off myhood functions.
     * 
     * @package MyHoodFunctions
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     * 
     */

     function updateBids($userID)
     {
         $now = strtotime(date("Y-m-d H:i:s"));  //converting times to str
         
         include_once 'config.inc.php';
         $con = get_dbconn("");
         
         $result = mysql_query("SELECT IsActive FROM BID
             INNER JOIN AUCTION
             ON BID.AuctionID=AUCTION.AuctionID
             INNER JOIN APPLICTION
             ON AUCTION.ApplicaitonID=APPLICATION.ApplicationID
             WHERE BID.IsActive='1' AND APPLICATION.UserID='$userID'");
         
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
         
         while($row = mysql_fetch_array($result))
         {
             $expire = strtotime($row[DateAcceptEndPFO]) + (60 * 60 * 36);
             
             if($now < $expire)
             {
                 try{
                     mysql_query("UPDATE IsActive='0' FROM BID
                     WHERE BidID='$row[BidID]'");
                    }
                    catch (Exception $e) {
                    echo 'Connection failed. ' . $e->getMessage();
                    }
                 
                 
             }
         }
         
     }
?>
