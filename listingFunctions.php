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
                $maxBid = "<font class='greyTextArea' style='float:right;'>$" .$row[0] . "</font>";
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


            echo '    
            <div id="searchResult">
            <div class="header">
                '. $status . '
                ' . $maxBid . '
                ' . $timeString . '
                '. $row[DatePFOAccept] .'
            </div>

            <div class="content">
            <image class="PFOimage" src="#" />
            <div class="column1">
               '.$row[Address].'<br/>
               '.$row[City].'<br/>
               '.$row[State].'<br/>
               '.$row[Zip].'<br/>
            </div>
            <div class="column2">
                Bidder ID ---  Price of Bid --- Date <br/>
                ';


                        $result2 = mysql_query("SELECT * FROM BID
                            INNER JOIN AUCTION
                            ON AUCTION.AuctionID=BID.AuctionID
                            INNER JOIN APPLICATION
                            ON APPLICATION.ApplicationID=BID.ApplicationID
                            INNER JOIN USER
                            ON USER.UserID=APPLICATION.UserID
                            WHERE PropertyID='$row[PropertyID]'
                            ORDER BY MonthlyRate");
                        $max = 0;
                        while($row2 = mysql_fetch_array($result2))
                        {
                            echo  $row2[UserName] . " " . 
                                $row2[MonthlyRate]. " " . $row2[TimeReceived] .'<br/> ';
                            $max += 1;
                            if($max > 3)
                            {
                                break;
                            }
                        }

            echo '</div>
            <div class="column3">
                '.substr($row[Description], 0, 175).'
            </div>
            <div class="column4">
                Next Open House<br/>
                '.$row[DateTimeOpenHouse1].'<br/>
                '.$row[DateTimeOpenHouse2].'
            </div>

            <div class="footer">
            <form class="buttonForm" method="get" action="homeListing.php">
                <input type="text" name="listingID" style="Display:none" value="' . $row[PropertyID] . '" />
                <button class="button" type="submit">View Listing Page</button>
            </form>
            <form class="buttonForm" method="get" action="homeListing.php">
                <input type="text" name="listingID" style="Display:none" value="' . $row[PropertyID] . '" />
                <button class="button" type="submit">View Listing</button>
            </form>
            </div>
            </div>
        </div>'; 
            
            mysql_close();
        }
    
    function displayMyListings($propertyID)
        {

                include_once 'config.inc.php';
                $con = get_dbconn("");

                $result = mysql_query("SELECT * FROM PROPERTY
                WHERE PROPERTY.PropertyID ='$propertyID'");

                $row = mysql_fetch_array($result);
                include_once 'listingFunctions.php';

                //below is call to function that returns the timestring of time remaining or time till start
                $timeString = getTime($row[DatePFOAccept], $row[DatePFOEndAccept]);


                //The code below will return the listings status
                $status = getStatus($row[DatePFOAccept], $row[DatePFOEndAccept]);

                //this code is retrieving the highest bid of the auction and returning it
                $maxBid = getHighBid($row[PropertyID]);





                if($row[IsPaid] == 0)
                {
                     echo '<font class="redTextArea">You have not yet paid your fee. The Property below will not be sent to an administrator for approval until your fee is paid.  Please go<a href="payListingFee.php?propertyID='. $row[PropertyID] .'"> HERE</a> to pay your fee.</font>';
                }
                if($row[IsPaid] == 1  && $row[IsApproved] == 0)
                {
                    echo '<font class="yellowTextArea">The Property below is awaiting approval from an administrator. </font>';
                }

                echo '    <div id="myHoodListing">
                <div class="header">
                    '. $status . '
                    <font class="greyTextArea" style="float:right;">' . $maxBid . '</font>
                    ' . $timeString . '
                </div>

                <div class="content">
                <image class="PFOimage" src="#" />
                <div class="column1">
                   '.$row[Address].'<br/>
                   '.$row[City].'<br/>
                   '.$row[State].'<br/>
                   '.$row[Zip].'<br/>
                </div>
                <div class="column2">
                    Bidder ID ---  Price of Bid --- Date <br/>
                    ';


                            $result2 = mysql_query("SELECT * FROM BID
                                INNER JOIN AUCTION
                                ON AUCTION.AuctionID=BID.AuctionID
                                INNER JOIN APPLICATION
                                ON APPLICATION.ApplicationID=BID.ApplicationID
                                INNER JOIN USER
                                ON USER.UserID=APPLICATION.UserID
                                WHERE PropertyID='$row[PropertyID]'
                                ORDER BY MonthlyRate DESC");
                            $max = 0;
                            $won = false;
                            $winnerID = '';
                            while($row2 = mysql_fetch_array($result2))
                            {
                                
                                if($max < 3)
                                    {
                                        echo  $row2[UserName] . " " . 
                                        $row2[MonthlyRate]. " " . $row2[TimeReceived] .'<br/> ';
                                    }
                                $max += 1;
                                if($row2[IsWinningBid] == "1")
                                {
                                    $won = true;
                                    $winnerID = $row2[ApplicationID];
                                }

                            }






                echo '</div>
                <div class="column3">
                    '.substr($row[Description], 0, 175).'
                </div>
                <div class="column4">
                    Next Open House<br/>
                    '.$row[DateTimeOpenHouse1].'<br/>
                    '.$row[DateTimeOpenHouse2].'
                </div>

                <div class="footer">
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
                </div>
                </div>
                </div>';
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
