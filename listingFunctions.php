<?php
    //This function retrieve that start and end time of the auciton
    //It then calculates if the auction has has started, has ended, or is
    //currently running.  It will then return the correct string for the result
    function getTime($DateAcceptPFO,$DateEndAcceptPFO)
    {
        $timeString = 'error';
        if(date("Y-m-d H:i:s") < $DateAcceptPFO)
        {
            //The code below will get the time to the auction begining.
            $ends = strtotime($row[DatePFOAccept]);
            $now = strtotime(date("Y-m-d H:i:s"));
            $difference = $ends - $now;
            $years = abs(floor($difference / 31536000));
            $days = abs(floor(($difference-($years * 31536000))/86400));
            $hours = abs(floor(($difference-($years * 31536000)-($days * 86400))/3600));
            $mins = abs(floor(($difference-($years * 31536000)-($days * 86400)-($hours * 3600))/60));#floor($difference / 60);
            $timeString = 'Begins in: ' . $days . ' Days, ' . $hours . ' Hours, ' . $mins . ' Minutes';
        }
        else if(date("Y-m-d H:i:s") > $DateEndAcceptPFO)
        {
            $timeString = "Auction has ended";
        }
        else
        {
            //The code below will get the time to the auction ending.
            $ends = strtotime($DateEndAcceptPFO);
            $now = strtotime(date("Y-m-d H:i:s"));
            $difference = $ends - $now;
            $years = abs(floor($difference / 31536000));
            $days = abs(floor(($difference-($years * 31536000))/86400));
            $hours = abs(floor(($difference-($years * 31536000)-($days * 86400))/3600));
            $mins = abs(floor(($difference-($years * 31536000)-($days * 86400)-($hours * 3600))/60));#floor($difference / 60);
            $timeString = 'Ends in: ' . $days . ' Days, ' . $hours . ' Hours, ' . $mins . ' Minutes';
        }
        
        return $timeString;
    }
    
    //This function recieves the starting and end date of the auciton.
    //It then determins the status of the auciton.
    //and returns this back
    function getStatus($DateAcceptPFO,$DateEndAcceptPFO)
    {
        if(date("Y-m-d H:i:s") > $DateAcceptPFO && date("Y-m-d H:i:s") < $DateEndAcceptPFO)
        {
            $status = "Open for Bids";
        }
        else if(date("Y-m-d H:i:s") < $DateAcceptPFO)
        {
            $status = "Bidding has not yet started";
        }
        else
        {
            $status = "Bidding has Ended";
        }
        return $status;
    }
    
    //This funciton retrieves the highest bid on the property that corisponds to the given property ID
    function getHighBid($propertyID)
    {
        include_once 'config.inc.php';
        
        $con = get_dbconn("");
        
        //this code is retrieving the highest bid of the auction and returning it
        $result = mysql_query("SELECT max(MonthlyRate) FROM BID
                        INNER JOIN AUCTION
                        ON AUCTION.AuctionID=BID.AuctionID
                        WHERE PropertyID='$propertyID'");
        
        
        $row = mysql_fetch_array($result);
        
        if(isset($row[0]))
        {
            $maxBid = $row[0];
        }
        else
        {
            $maxBid = '0.00' ;
        }
        
        
        return $maxBid;
    }
    
    function displayMyProperty()
    {
        
    }
    
    
?>
