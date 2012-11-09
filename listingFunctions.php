<?php
    //This function retrieve that start and end time of the auciton
    //It then calculates if the auction has has started, has ended, or is
    //currently running.  It will then return the correct string for the result
    function getTime($DateAcceptPFO,$DateEndAcceptPFO)
    {
        $start = strtotime($DateAcceptPFO);
        $now = strtotime(date("Y-m-d H:i:s"));
        $ends = strtotime($DateEndAcceptPFO);
        $timeString = 'error';
        if($now < $start)
        {
            //The code below will get the time to the auction begining.
            $difference = $start - $now;
            $years = abs(floor($difference / 31536000));
            $days = abs(floor(($difference-($years * 31536000))/86400));
            $hours = abs(floor(($difference-($years * 31536000)-($days * 86400))/3600));
            $mins = abs(floor(($difference-($years * 31536000)-($days * 86400)-($hours * 3600))/60));#floor($difference / 60);
            
            $timeString = 'Begins in:
                ';
            if($days != 0)
            {
            $timeString = $timeString . $days . ' Days, ';
            }
            if($hours != 0)
            {
            $timeString = $timeString . $hours . ' Hours, ';
            }
            $timeString = $timeString . $mins . ' Minutes';
        }
        elseif($now > $DateEndAcceptPFO)
        {
            $timeString = "Auction has ended";
        }
        else
        {
            //The code below will get the time to the auction ending.
            $difference = $ends - $now;
            $years = abs(floor($difference / 31536000));
            $days = abs(floor(($difference-($years * 31536000))/86400));
            $hours = abs(floor(($difference-($years * 31536000)-($days * 86400))/3600));
            $mins = abs(floor(($difference-($years * 31536000)-($days * 86400)-($hours * 3600))/60));#floor($difference / 60);
            
            $timeString = 'Begins in:
                ';
            if($days != 0)
            {
            $timeString += $days . ' Days, ';
            }
            if($hours != 0)
            {
            $timeString += $hours . ' Hours, ';
            }
            $timeString += $mins . ' Minutes';
        }
        
        return $timeString;
    }
    
    //This function recieves the starting and end date of the auciton.
    //It then determins the status of the auciton.
    //and returns this back
    function getStatus($DateAcceptPFO,$DateEndAcceptPFO)
    {
        $start = strtotime($DateAcceptPFO);
        $now = strtotime(date("Y-m-d H:i:s"));
        $ends = strtotime($DateEndAcceptPFO);
        if($now > $start && $now < $ends)
        {
            $status = "Open for Bids";
        }
        elseif($now < $start)
        {
            $status = "Bidding has not yet started";
        }
        else
        {
            $status = "Bidding has Ended";
        }
        return $status;
    }
    
    //Function gets the two times, and compares them to get the status.
    //It then returns and int to designate the status of the auction.
    //1=open 2=Not Started 3=Ended
    function getStatusInt($DateAcceptPFO,$DateEndAcceptPFO)
    {
        $start = strtotime($DateAcceptPFO);
        $now = strtotime(date("Y-m-d H:i:s"));
        $ends = strtotime($DateEndAcceptPFO);
        if($now > $start && $now < $ends)
        {
            $status = 1;
        }
        elseif($now < $start)
        {
            $status = 0;
        }
        else
        {
            $status = 2;
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
    
    //This funciton will test the user using the given UserID and PropertyID
    //It will determin the users ability to bid and return an integer to represent thier status
    //0 - Okay to bid, no other active bids
    //1 - Application not compleate
    //2 - Applicaiton not authorized
    //3 - Bid fee not paid
    //4 - Another bid is active on a differant auction
    
    function getUsersBidStatus($userID,$propertyID)
    {
        
        include_once 'config.inc.php';
        $status = "0";
        
        $con = get_dbconn("");
        
        $result = mysql_query("SELECT * FROM BID
        INNER JOIN APPLICATION
        ON BID.ApplicationId=APPLICATION.ApplicationID
        WHERE APPLICATION.UserID = '$_SESSION[userID]'
        ");
        
        if(!$result)
             {
                 die('could not connect: ' .mysql_error());
             }
             
        while($row = mysql_fetch_array($result))
            {
                echo $row[UserID];
                echo $row[AppicationID];
                echo $row[AuctionID];
                echo $row[BidId];
                echo $row[PropertyID];
            }
                  
                    
        
        return $status;
        
        
    }
    
    
?>
