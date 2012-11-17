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


     /**
      * This funciton checks to see if the users active bid has expired.
      * 
      * If teh bid is over 36 hours pas the auction end the bid will be
      * released and the activebid field will be changed to 0 allowing the
      * user to place another bid on a different propertty.
      * 
      * @param string $userID
      * 
      * @author David Pyle <Pyledw@Gmail.com>
      */
     function updateBids($userID)
     {
         $now = strtotime(date("Y-m-d H:i:s"));  //converting times to str
         
         include_once 'config.inc.php';
         $con = get_dbconn("");
         
         //Query to retrive all active biids of the user
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
