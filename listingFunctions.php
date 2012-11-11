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
            
            
            
            if($days != 0)
            {
            $timeString = '<font class="greyTextArea" style="float:right;">Begins in: '.$days .'  Days, '. $hours . ' Hours, '. $mins .' Minutes </font>';
            }
            if($hours != 0)
            {
            $timeString = '<font class="yellowTextArea" style="float:right;">Begins in: '. $hours . ' Hours, '. $mins .' Minutes </font>';
            }
            if($hours == 0)
            {
                $timeString = '<font class="redTextArea" style="float:right;">Begins in: '. $mins .' Minutes </font>';
            }
            
            
        }
        elseif($now > $ends)
        {
            $timeString = '<font class="greyTextArea" style="float:right;">Bidding has ended</font>';
        }
        else
        {
            //The code below will get the time to the auction ending.
            $difference = $ends - $now;
            $years = abs(floor($difference / 31536000));
            $days = abs(floor(($difference-($years * 31536000))/86400));
            $hours = abs(floor(($difference-($years * 31536000)-($days * 86400))/3600));
            $mins = abs(floor(($difference-($years * 31536000)-($days * 86400)-($hours * 3600))/60));#floor($difference / 60);
            
            
            if($days != 0)
            {
            $timeString = '<font class="greyTextArea" style="float:right;">Ends in: '.$days .'  Days, '. $hours . ' Hours, '. $mins .' Minutes </font>';
            }
            if($hours != 0)
            {
            $timeString = '<font class="yellowTextArea" style="float:right;">Ends in: '. $hours . ' Hours, '. $mins .' Minutes </font>';
            }
            if($hours == 0)
            {
                $timeString = '<font class="redTextArea" style="float:right;">Ends in: '. $mins .' Minutes </font>';
            }
            
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
           $status = '<font class="greenTextArea" style="float:right;">Satus:Open for PFOs</font>';
        }
        elseif($now < $start)
        {
            $status = '<font class="yellowTextArea" style="float:right;">Satus:Bidding has not yet started</font>';
        }
        elseif($now > $ends)
        {
            $status = '<font class="greyTextArea" style="float:right;">Satus:Bidding Has Ended</font>';
        }
        else
        {
            $status = "";
        }
        return $status;
    }
    
    //Function gets the two times, and compares them to get the status.
    //It then returns and int to designate the status of the auction.
    //1=open 2=Not Started 3=Ended
    function getStatusInt($DateAcceptPFO,$DateEndAcceptPFO)
    {
        $status = "error";
        $start = strtotime($DateAcceptPFO);
        $now = strtotime(date("Y-m-d H:i:s"));
        $ends = strtotime($DateEndAcceptPFO);
        //echo $start ."<br/>";
        //echo $now ."<br/>";
        //echo $ends ."<br/>";
        
        if($now > $start && $now < $ends)
        {
            $status = "1";
        }
        elseif($now > $ends)
        {
            $status = "3";
        }
        elseif($now < $start)
        {
            $status = "2";
        }
        else
        {
            $status = "error";
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
        $status = "1";
        $ActiveBids = false;
        
        $con = get_dbconn("");
        
        $result = mysql_query("SELECT * FROM BID
        INNER JOIN APPLICATION
        ON BID.ApplicationID=APPLICATION.ApplicationID
        INNER JOIN AUCTION
        ON BID.AuctionID=AUCTION.AuctionID
        WHERE APPLICATION.UserID = '$userID'
        ");
        
        
        
        if(!$result)
             {
                 die('could not connect: ' .mysql_error());
             }
            
        while($row = mysql_fetch_array($result))
            {
            
            
                //echo $row[PageCompleted];
                //echo $row[IsPaid];
                //echo $row[IsApproved];
                //echo $row[PropertyID];
                //echo '<br/>';
                //echo $propertyID;
                if($row[PageCompleted] != "6")
                {
                    $status = "1";
                }
                elseif($row[IsPaid] == "0")
                {
                    $status = "3";
                }
                elseif($row[IsApproved] == "0")
                {
                    $status = "2";
                }
                elseif($row[PropertyID] != $propertyID && $row[IsActive] == "1")
                {
                    $ActiveBids = true;
                }
                else
                {
                    $status = "0";
                }
            }
                  
        if($ActiveBids)
        {
            $status = "4";
        }
        
        return $status;
        
        
    }
    
    
    
    
?>
