<?php
    //This function retrieve that start and end time of the auciton
    //It then calculates if the auction has has started, has ended, or is
    //currently running.  It will then return the correct string for the result
    function getTime($DateAcceptPFO,$DateEndAcceptPFO)
        {
        

            $start = strtotime($DateAcceptPFO);
            $now = strtotime(date("Y-m-d H:i:s"));
            $ends = strtotime($DateEndAcceptPFO);
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
                elseif($hours != 0)
                {
                $timeString = '<font class="yellowTextArea" style="float:right;">Begins in: '. $hours . ' Hours, '. $mins .' Minutes </font>';
                }
                elseif($hours == 0)
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
                elseif($hours != 0)
                {
                $timeString = '<font class="yellowTextArea" style="float:right;">Ends in: '. $hours . ' Hours, '. $mins .' Minutes </font>';
                }
                elseif($hours == 0)
                {
                    $timeString = '<font class="redTextArea" style="float:right;">Ends in: '. $mins .' Minutes </font>';
                }
                else 
                {

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
            unset($start);
            unset($now);
            unset($ends);
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
            
            unset($start);
            unset($now);
            unset($ends);
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
                $maxBid = '<font class="greyTextArea" style="float:right;">$'.$row[0] .'</font>';
            }
            else
            {
                $maxBid = "" ;
            }


            return $maxBid;
        }
    
    
    
        
        
    
    //This function retrieves the Auction ID and displays the property and infromation based off that ID.
    function displaySearchResults($auctionID)
        {
        
            echo '<link rel="stylesheet" type="text/css" href="css/homeListing.css" /><!--Link to Main css file -->';
            include_once 'config.inc.php';

            $con = get_dbconn("");

            //this code is retrieving the highest bid of the auction and returning it
            $result = mysql_query("SELECT * FROM AUCTION
                INNER JOIN PROPERTY
                ON AUCTION.PropertyID=PROPERTY.PropertyID
                WHERE AuctionID='$auctionID'");

            $row = mysql_fetch_array($result);

            include_once 'listingFunctions.php';
            
            //below is call to function that returns the timestring of time remaining or time till start
            $timeString = getTime($row[DatePFOAccept], $row[DatePFOEndAccept]);

            //The code below will return the listings status
            $status = getStatus($row[DatePFOAccept], $row[DatePFOEndAccept]);

            //this code is retrieving the highest bid of the auction and returning it

            $maxBid = getHighBid($row[PropertyID]);
            
            echo '<font style="float:right; position:relative; right:20px;">
                    '
                   .$timeString
                   .$status
                   .$maxBid.
                '</font><br/>
        <table id="houseListing">
            <img class="mainPhoto" style="float:left; position: relative; margin:-150px -150px; left:145px; top:140px;" src="<?php echo $row[ImagePathPrimary]; ?>" alt="Main Photo" />
            <tr>
                <td width="102px;" rowspan="6">
                    
                </td>
                <td colspan="2" width="600px">
                    <b>'. $row[Address] . " - " . $row[PropertyID] . " - " . '<a href="Http://www.google.com/maps?q='. $row[Address] . ' ' . $row[City] . ' ' . $row[State] .'" >Map It</a> - Print Brochure</b>
                </td>
                <td align="center" class="redBackground" colspan="2">
                    Current Bids
                </td>
            </tr>
            <tr>
                
                
                <td width="350px" rowspan="5" style="vertical-align: top; border-bottom:none;">
                    '.substr($row[Description], 0, 200).'<br/><br/><a href="homeListing.php?listingID='.$row[PropertyID].'" class="button">View Listing</a>
                </td>
                <td style="text-align: center;" class="greyBackground">
                    Features
                </td>
                <td>
                    Username
                </td>
                <td>
                    Bid Amount
                </td>
            </tr>';
            
            
            
            echo '<tr>
   
                <td rowspan="5" width="275px" style="padding:0 0 0 0; vertical-align:top;">
                    <table id="innerTable">
                        <tr>
                            <td align="right">
                                <b>Bedrooms:</b>
                            </td>
                            <td>
                                '. ' ' .$row[Bedroom] .'
                            </td>
                            <td align="right">
                                <b>Bathrooms:</b> 
                            </td>
                            <td>
                                '. ' ' .$row[Bath] .'
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <b>Square Feet:</b>
                            </td>
                            <td>
                                '. ' ' .$row[SF] .'
                            </td>
                            <td align="right">
                                <b>Heat:</b> 
                            </td>
                            <td>
                                '. ' ' .$row[Heating] .'
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <b>Air:</b>
                            </td>
                            <td>
                                '. ' ' .$row[AC] .'
                            </td>
                            <td align="right">
                                <b>Media:</b> 
                            </td>
                            <td>
                                '. ' ' .$row[Media] .'
                            </td>
                        </tr>
                    </table>
                </td>
                    </tr>';
            
            $bids = mysql_query("SELECT * FROM BID
                            INNER JOIN AUCTION
                            ON AUCTION.AuctionID=BID.AuctionID
                            INNER JOIN APPLICATION
                            ON APPLICATION.ApplicationID=BID.ApplicationID
                            INNER JOIN USER
                            ON USER.UserID=APPLICATION.UserID
                            WHERE PropertyID='$row[PropertyID]'
                            ORDER BY MonthlyRate DESC");
                        $max = 0;
                        while($bid = mysql_fetch_array($bids))
                        {
                            echo  '<tr><td>' . $bid[UserName] . '</td>' . 
                                   '<td>$'.$bid[MonthlyRate]. "</td></tr>";
                            $max += 1;
                            if($max > 3)
                            {
                                break;
                            }
                        }
                        while($max <= 2)
                        {
                            echo '<tr><td height="19px" ></td><td></td></tr>';
                            $max += 1;
                        }



            echo '
        </table>
        ';

            
            mysql_close();
        }
    
    function displayMyListings($propertyID)
        {

        
        
        echo '<link rel="stylesheet" type="text/css" href="css/homeListing.css" /><!--Link to Main css file -->';
        include_once 'config.inc.php';

            $con = get_dbconn("");

            //this code is retrieving the highest bid of the auction and returning it
            $result = mysql_query("SELECT * FROM AUCTION
                INNER JOIN PROPERTY
                ON AUCTION.PropertyID=PROPERTY.PropertyID
                WHERE PROPERTY.PropertyID='$propertyID'");

            $row = mysql_fetch_array($result);

            include_once 'listingFunctions.php';
            
            //below is call to function that returns the timestring of time remaining or time till start
            $timeString = getTime($row[DatePFOAccept], $row[DatePFOEndAccept]);

            //The code below will return the listings status
            $status = getStatus($row[DatePFOAccept], $row[DatePFOEndAccept]);

            //this code is retrieving the highest bid of the auction and returning it

            $maxBid = getHighBid($row[PropertyID]);
            
            echo '<font style="float:right; position:relative; right:20px;">
                    '
                   .$timeString
                   .$status
                   .$maxBid.
                '</font><br/>
        <table id="houseListing">
            <img class="mainPhoto" style="float:left; position: relative; margin:-150px -150px; left:145px; top:140px;" src="<?php echo $row[ImagePathPrimary]; ?>" alt="Main Photo" />
            <tr>
                <td width="102px;" rowspan="6">
                    
                </td>
                <td colspan="2" width="600px">
                    <b>'. $row[Address] . " - " . $row[PropertyID] . " - " . '<a href="Http://www.google.com/maps?q='. $row[Address] . ' ' . $row[City] . ' ' . $row[State] .'" >Map It</a> - Print Brochure</b>
                </td>
                <td align="center" class="redBackground" colspan="2">
                    Current Bids
                </td>
            </tr>
            <tr>
                
                
                <td width="350px" rowspan="5" style="vertical-align: top; border-bottom:none;">
                    '.substr($row[Description], 0, 200).'<br/><br/>
                     <form class="buttonForm" method="POST" action="newListing1.php">
                    <input type="text" name="propertyID" style="Display:none" value="' . $row[PropertyID] . '" />
                    <button type="submit" class="button">Edit Listing</button>
                </form>
                ';
                if($won)
                {
                    echo'
                    <a href="viewApplication.php?applicationID='.$winnerID.'" rel="facebox" class="button">Review Choosen Application</a>
                    ';
                }
                else
                {
                    echo'
                    <a href="reviewPFOs.php?propertyID='. $row[PropertyID] . '&auctionID='.$row[AuctionID].'" rel="facebox" class="button">Review PFOs</a>
                    ';
                }
                
                echo'
                <a href="printFlyer.php?propertyID='. $row[PropertyID] . '" class="button">Print Flyer</a>
                </td>
                <td style="text-align: center;" class="greyBackground">
                    Features
                </td>
                <td>
                    Username
                </td>
                <td>
                    Bid Amount
                </td>
            </tr>';
            
            
            
            echo '<tr>
   
                <td rowspan="5" width="275px" style="padding:0 0 0 0; vertical-align:top;">
                    <table id="innerTable">
                        <tr>
                            <td align="right">
                                <b>Bedrooms:</b>
                            </td>
                            <td>
                                '. ' ' .$row[Bedroom] .'
                            </td>
                            <td align="right">
                                <b>Bathrooms:</b> 
                            </td>
                            <td>
                                '. ' ' .$row[Bath] .'
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <b>Square Feet:</b>
                            </td>
                            <td>
                                '. ' ' .$row[SF] .'
                            </td>
                            <td align="right">
                                <b>Heat:</b> 
                            </td>
                            <td>
                                '. ' ' .$row[Heating] .'
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <b>Air:</b>
                            </td>
                            <td>
                                '. ' ' .$row[AC] .'
                            </td>
                            <td align="right">
                                <b>Media:</b> 
                            </td>
                            <td>
                                '. ' ' .$row[Media] .'
                            </td>
                        </tr>
                    </table>
                </td>
                    </tr>';
            
            $bids = mysql_query("SELECT * FROM BID
                            INNER JOIN AUCTION
                            ON AUCTION.AuctionID=BID.AuctionID
                            INNER JOIN APPLICATION
                            ON APPLICATION.ApplicationID=BID.ApplicationID
                            INNER JOIN USER
                            ON USER.UserID=APPLICATION.UserID
                            WHERE PropertyID='$row[PropertyID]'
                            ORDER BY MonthlyRate DESC");
                        $max = 0;
                        while($bid = mysql_fetch_array($bids))
                        {
                            echo  '<tr><td>' . $bid[UserName] . '</td>' . 
                                   '<td>$'.$bid[MonthlyRate]. "</td></tr>";
                            $max += 1;
                            if($max > 3)
                            {
                                break;
                            }
                        }
                        while($max <= 2)
                        {
                            echo '<tr><td height="19px" ></td><td></td></tr>';
                            $max += 1;
                        }



            echo '
        </table>
        ';
            
        }
        
    //This function retrieves the PropertyIDs of the listing the user has an active bid on
    //it then displays the listing with the active bid.
    function displayMyPFOs($propertyID)
    {
        echo '<link rel="stylesheet" type="text/css" href="css/homeListing.css" /><!--Link to Main css file -->';
        include_once 'config.inc.php';

            $con = get_dbconn("");

            //this code is retrieving the highest bid of the auction and returning it
            $result = mysql_query("SELECT * FROM AUCTION
                INNER JOIN PROPERTY
                ON AUCTION.PropertyID=PROPERTY.PropertyID
                WHERE PROPERTY.PropertyID='$propertyID'");

            $row = mysql_fetch_array($result);

            include_once 'listingFunctions.php';
            
            //below is call to function that returns the timestring of time remaining or time till start
            $timeString = getTime($row[DatePFOAccept], $row[DatePFOEndAccept]);

            //The code below will return the listings status
            $status = getStatus($row[DatePFOAccept], $row[DatePFOEndAccept]);

            //this code is retrieving the highest bid of the auction and returning it

            $maxBid = getHighBid($row[PropertyID]);
            
            echo '<font style="float:right; position:relative; right:20px;">
                    '
                   .$timeString
                   .$status
                   .$maxBid.
                '</font><br/>
        <table id="houseListing">
            <img class="mainPhoto" style="float:left; position: relative; margin:-150px -150px; left:145px; top:140px;" src="<?php echo $row[ImagePathPrimary]; ?>" alt="Main Photo" />
            <tr>
                <td width="102px;" rowspan="6">
                    
                </td>
                <td colspan="2" width="600px">
                    <b>'. $row[Address] . " - " . $row[PropertyID] . " - " . '<a href="Http://www.google.com/maps?q='. $row[Address] . ' ' . $row[City] . ' ' . $row[State] .'" >Map It</a> - Print Brochure</b>
                </td>
                <td align="center" class="redBackground" colspan="2">
                    Current Bids
                </td>
            </tr>
            <tr>
                
                
                <td width="350px" rowspan="5" style="vertical-align: top; border-bottom:none;">
                    '.substr($row[Description], 0, 200).'<br/><br/>
                     <a class="button">Move in now at: $'. $row[RentNowRate] .'</a>
                     <a href="homeListing.php?listingID='. $row[PropertyID] . '" class="button">View Listing</a>
                     ';
                
                echo'
                </td>
                <td style="text-align: center;" class="greyBackground">
                    Features
                </td>
                <td>
                    Username
                </td>
                <td>
                    Bid Amount
                </td>
            </tr>';
            
            
            
            echo '<tr>
   
                <td rowspan="5" width="275px" style="padding:0 0 0 0; vertical-align:top;">
                    <table id="innerTable">
                        <tr>
                            <td align="right">
                                <b>Bedrooms:</b>
                            </td>
                            <td>
                                '. ' ' .$row[Bedroom] .'
                            </td>
                            <td align="right">
                                <b>Bathrooms:</b> 
                            </td>
                            <td>
                                '. ' ' .$row[Bath] .'
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <b>Square Feet:</b>
                            </td>
                            <td>
                                '. ' ' .$row[SF] .'
                            </td>
                            <td align="right">
                                <b>Heat:</b> 
                            </td>
                            <td>
                                '. ' ' .$row[Heating] .'
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <b>Air:</b>
                            </td>
                            <td>
                                '. ' ' .$row[AC] .'
                            </td>
                            <td align="right">
                                <b>Media:</b> 
                            </td>
                            <td>
                                '. ' ' .$row[Media] .'
                            </td>
                        </tr>
                    </table>
                </td>
                    </tr>';
            
            $bids = mysql_query("SELECT * FROM BID
                            INNER JOIN AUCTION
                            ON AUCTION.AuctionID=BID.AuctionID
                            INNER JOIN APPLICATION
                            ON APPLICATION.ApplicationID=BID.ApplicationID
                            INNER JOIN USER
                            ON USER.UserID=APPLICATION.UserID
                            WHERE PropertyID='$row[PropertyID]'
                            ORDER BY MonthlyRate DESC");
                        $max = 0;
                        while($bid = mysql_fetch_array($bids))
                        {
                            echo  '<tr><td>' . $bid[UserName] . '</td>' . 
                                   '<td>$'.$bid[MonthlyRate]. "</td></tr>";
                            $max += 1;
                            if($max > 3)
                            {
                                break;
                            }
                        }
                        while($max <= 2)
                        {
                            echo '<tr><td height="19px" ></td><td></td></tr>';
                            $max += 1;
                        }



            echo '
        </table>
        ';
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
        
        
        //This function returns the date and time of the date from the database so that it looks better.
        function convertDate($date,$hasTime)
        {
       

        $middle = strtotime($date);             // returns bool(false)

        
        
        if($hasTime == 0)
        {
            $new_date = date('D M d, Y ', $middle);   // returns Day Month date, Year
        }
        else 
        {
            $new_date = date('D M d, Y H:ia ', $middle);   // returns Day Month date, Year 00:00pm
        }
        
        
            
         return $new_date;   
        }
    
    
    
    
?>
