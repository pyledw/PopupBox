<?php
    /**
    * Functions for the processing, displaying, and searching of listings
    *
    * @package ListingFunctions
    *
    * @author David Pyle <Pyledw@Gmail.com>
    */




    /**
     * This function retrieve that start and end time of the auciton
     * It then calculates if the auction has has started, has ended, or is
     * currently running.  It will then return the correct string for the result
     * 
     * @param string $dateAcceptPFO contains the date PFOs are firs accepted
     * 
     * @param string $DateEndAcceptPFO contains teh date PFOs are no longer accepted
     * 
     * @return $timeString This is the string that contains the time to the end or begining of the auciton. It also contains all styling elements.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    function getTime($DateAcceptPFO,$DateEndAcceptPFO)
        {
        

            $start = strtotime($DateAcceptPFO);     //converting times to str
            $now = strtotime(date("Y-m-d H:i:s"));  //converting times to str
            $ends = strtotime($DateEndAcceptPFO);   //converting times to str
            
            if($now < $start)   //check to see if the auction has started yet.  Will run if the Auction begin date has not accured yet
            {
                
                
                //The code below will get the time to the auction begining.
                $difference = $start - $now;
                $years = abs(floor($difference / 31536000));
                $days = abs(floor(($difference-($years * 31536000))/86400));
                $hours = abs(floor(($difference-($years * 31536000)-($days * 86400))/3600));
                $mins = abs(floor(($difference-($years * 31536000)-($days * 86400)-($hours * 3600))/60));#floor($difference / 60);


                //displays for only displaying an element if it is not zero
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
            elseif($now > $ends)    //check to see if the auction is over.  Will run if the currnet time is past the auction end
            {
                $timeString = '<font class="greyTextArea" style="float:right;">Bidding has ended</font>';
            }
            else    //this will run if the auction is currently running
            {
                //The code below will get the time to the auction ending.
                $difference = $ends - $now;
                $years = abs(floor($difference / 31536000));
                $days = abs(floor(($difference-($years * 31536000))/86400));
                $hours = abs(floor(($difference-($years * 31536000)-($days * 86400))/3600));
                $mins = abs(floor(($difference-($years * 31536000)-($days * 86400)-($hours * 3600))/60));#floor($difference / 60);

                //displays for only displaying an element if it is not zero
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
            
                
            return $timeString;//returning the string with all html formatting
        }
    
    /**
     * This funciton will retrieve the auction status based off of the auciton start and end.
     * It will then add any needed html elements and return the compleated string back.
     * 
     * @param String $dateAcceptPFO This is the date the auction will begin accepting PFOs
     * 
     * @param String $DateEndAcceptPFO This is the date the auciton will stop accepting PFOs
     * 
     * @return String $status Status contains the current status with all the needed HTML wrapping.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    function getStatus($DateAcceptPFO,$DateEndAcceptPFO)
        {
            $start = strtotime($DateAcceptPFO);     //converting the time to str
            $now = strtotime(date("Y-m-d H:i:s"));  //converting the time to str
            $ends = strtotime($DateEndAcceptPFO);   //converting the time to str
            
            if($now > $start && $now < $ends)   //check to see if the auction is open for PFOs
            {
               $status = '<font class="greenTextArea" style="float:right;">Status:Open for PFOs</font>';
            }
            elseif($now < $start)   //Check to see if the auction has begun
            {
                $status = '<font class="yellowTextArea" style="float:right;">Status:Bidding has not yet started</font>';
            }
            elseif($now > $ends)    //check to see if the auction has ended
            {
                $status = '<font class="greyTextArea" style="float:right;">Status:Bidding Has Ended</font>';
            }
            else    //if none are true
            {
                $status = "";
            }
            
            unset($start);
            unset($now);
            unset($ends);
            
            
            return $status;//returning the variable with all html elements added
        }

    /**
     * Function gets the two times, and compares them to get the status.
     * 
     * @param String $dateAcceptPFO This is the date the auction will begin accepting PFOs
     * 
     * @param String $DateEndAcceptPFO This is the date the auciton will stop accepting PFOs
     * 
     * @return Int $status This int represents teh current status of the auction.  It will equal 1 if open, 2 if Not started, and 3 if auction has ended.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    function getStatusInt($DateAcceptPFO,$DateEndAcceptPFO)
        {
            $status = "error";
            $start = strtotime($DateAcceptPFO);
            $now = strtotime(date("Y-m-d H:i:s"));
            $ends = strtotime($DateEndAcceptPFO);
            //echo $start ."<br/>";
            //echo $now ."<br/>";
            //echo $ends ."<br/>";

            if($now > $start && $now < $ends)   //if the auction is currently running
            {
                $status = "1";
            }
            elseif($now < $start)   //if the auction is yet to begin
            {
                $status = "2";
            }
            elseif($now > $ends)    //if the auciton has already ended
            {
                $status = "3";
            }
            else    //error if none detected
            {
                $status = "error";
            }
            
            unset($start);
            unset($now);
            unset($ends);
            
            return $status;     //returning the status int of the auction
        }

    /**
     * This funciton retrieves the highest bid on the property that corisponds to the given property ID
     * 
     * @param String $propertyID This is teh ID of the property
     * 
     * @return String $maxBid Will return the max bid wrapped in html styling
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    function getHighBid($propertyID)
        {
            include_once 'config.inc.php';//including needed conneciton functions

            $con = get_dbconn("");//creating the DB connection

            //this code is retrieving the highest bid of the auction and returning it
            $result = mysql_query("SELECT max(MonthlyRate) FROM BID
                            INNER JOIN AUCTION
                            ON AUCTION.AuctionID=BID.AuctionID
                            WHERE PropertyID='$propertyID'");


            $row = mysql_fetch_array($result);//setting the query results into an array

            if(isset($row[0]))//if the check returned a high bid
            {
                $maxBid = '<font class="greyTextArea" style="float:right;">$'.$row[0] .'</font>';
            }
            else//if there was no hign bid
            {
                $maxBid = "" ;
            }


            return $maxBid;//retuning the string with all html elements included
        }
    
    
    
        
        
    
    /**
     * This function retrieves the Auction ID and displays the property and information based off that ID.
     * It will display them using the nedded styles. It echos the results back to the original file.
     * 
     * @param String $auctionID This variable is the AuctionID of the auction that will be displayed
     *  
     * @author David Pyle <Pyledw@Gmail.com>
     */
    function displaySearchResults($auctionID)
        {
        
            echo '<link rel="stylesheet" type="text/css" href="css/homeListing.css" /><!--Link to Main css file -->';//needed stylsheet for the result layout
            
            include_once 'config.inc.php';  //config needed
            include_once 'imageFunctions.php';

            $con = get_dbconn("");  //Creating DB connection
            
            

            /** this code is retrieving the highest bid of the auction and returning it */
            $result = mysql_query("SELECT * FROM AUCTION
                LEFT JOIN PROPERTY
                ON AUCTION.PropertyID=PROPERTY.PropertyID
                WHERE AuctionID='$auctionID'");
            
            /** this is fetching the query results and setting them in an array */
            $row = mysql_fetch_array($result);
            
            /** including teh funcitons needed for the listings */
            include_once 'listingFunctions.php';    
            
            /** call to function that returns the timestring of time remaining or time till start */
            $timeString = getTime($row['DatePFOAccept'], $row['DatePFOEndAccept']); 

            /** The code below will return the listings status */
            $status = getStatus($row['DatePFOAccept'], $row['DatePFOEndAccept']);   

            
            /** this code is retrieving the highest bid of the auction and returning it **/
            $maxBid = getHighBid($row['PropertyID']);   
            
            if($maxBid == '')
            {
                $maxBid = '<font class="greyTextArea" style="float:right;">$'.$row['StartingBid'].'</font>';
            }
            
            
            echo '<font style="float:right; position:relative; right:20px;">
                    '
                   .$timeString
                   .$status
                   .$maxBid.
                '</font><br/>
        <table id="houseListing">
            <img class="mainPhoto" style="float:left; position: relative; margin:-150px -150px; left:145px; top:140px;" src="'.  getMainThumbPath($row['PropertyID']).'" alt="Main Photo" />
            <tr>
                <td width="102px;" rowspan="5">
  
                    
                </td>
                <td colspan="2" width="600px">
                    <b>'. $row['Address'] . " - " . $row['PropertyID'] . " - " . '<a href="Http://www.google.com/maps?q='. $row['Address'] . ' ' . $row['City'] . ' ' . $row['State'] .'" >Map It</a> - Print Brochure</b>
                </td>
                <td align="center" class="redBackground" colspan="2">
                    Current Bids
                </td>
            </tr>
            <tr>
                
                
                <td width="350px" rowspan="4" style="vertical-align: top; border-bottom:none;">
                    '.substr($row['Description'], 0, 150).'<br/><br/><a href="homeListing.php?listingID='.$row['PropertyID'].'" class="button">View Listing</a>
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
   
                <td rowspan="3" width="275px" style="padding:0 0 0 0; vertical-align:top;">
                    <table id="innerTable">
                        <tr>
                            <td align="right">
                                <b>Bedrooms:</b>
                            </td>
                            <td>
                                '. ' ' .$row['Bedroom'] .'
                            </td>
                            <td align="right">
                                <b>Bathrooms:</b> 
                            </td>
                            <td>
                                '. ' ' .$row['Bath'] .'
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <b>Square Feet:</b>
                            </td>
                            <td>
                                '. ' ' .$row['SF'] .'
                            </td>
                            <td align="right">
                                <b>Heat:</b> 
                            </td>
                            <td>
                                '. ' ' .$row['Heating'] .'
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <b>Air:</b>
                            </td>
                            <td>
                                '. ' ' .$row['AC'] .'
                            </td>
                            <td align="right">
                                <b>Media:</b> 
                            </td>
                            <td>
                                '. ' ' .$row['Media'] .'
                            </td>
                        </tr>
                    </table>
                </td>
                    ';

            
            
            
            $bids = mysql_query("SELECT * FROM BID
                            INNER JOIN AUCTION
                            ON AUCTION.AuctionID=BID.AuctionID
                            INNER JOIN APPLICATION
                            ON APPLICATION.ApplicationID=BID.ApplicationID
                            INNER JOIN USER
                            ON USER.UserID=APPLICATION.UserID
                            WHERE AUCTION.AuctionID='$auctionID' AND PropertyID='$row[PropertyID]'
                            ORDER BY MonthlyRate DESC");
                        $max = 0;
                        
                        
                        while($bid = mysql_fetch_array($bids))//while there are bids
                        {
                            if($max == 0)
                            {
                            echo  '<td>' . $bid['UserName'] . '</td>' . 
                                   '<td>$'.$bid['MonthlyRate']. "</td></tr>";
                            $max += 1;
                            }
                            else
                            {
                               echo  '<tr><td>' . $bid['UserName'] . '</td>' . 
                                   '<td>$'.$bid['MonthlyRate']. "</td></tr>";
                            $max += 1; 
                            }
                            if($max > 2)
                            {
                                break;
                            }
                        }
                        while($max <= 2)//while there is still empty space in the table
                        {
                            if($max == 0)
                            {
                                echo '<td height="19px" ></td><td></td></tr>';
                                $max += 1;
                               
                            }
                            else
                            {
                                echo '<tr><td height="19px" ></td><td></td></tr>';
                                $max += 1;
                            }
                        }



            echo '
        </table>
        ';

            
            mysql_close();
        }
    
    /**
     * This function retrieves the Auction ID and displays the Pre Marketing properties and information 
     * based off that ID.
     * It will display them using the nedded styles. It echos the results back to the original file.
     * 
     * @param String $auctionID This variable is the AuctionID of the auction that will be displayed
     *  
     * @author David Pyle <Pyledw@Gmail.com>
     */
    function displaySearchPreMarket($auctionID)
        {
        
            echo '<link rel="stylesheet" type="text/css" href="css/homeListing.css" /><!--Link to Main css file -->';//needed stylsheet for the result layout
            
            include_once 'config.inc.php';  //config needed
            include_once 'imageFunctions.php';

            $con = get_dbconn("");  //Creating DB connection
            
            

            /** this code is retrieving the highest bid of the auction and returning it */
            $result = mysql_query("SELECT * FROM AUCTION
                LEFT JOIN PROPERTY
                ON AUCTION.PropertyID=PROPERTY.PropertyID
                WHERE AuctionID='$auctionID'");
            
            /** this is fetching the query results and setting them in an array */
            $row = mysql_fetch_array($result);
            
            /** including teh funcitons needed for the listings */
            include_once 'listingFunctions.php';    
            
            /** call to function that returns the timestring of time remaining or time till start */
            $timeString = getTime($row['DatePFOAccept'], $row['DatePFOEndAccept']); 

            /** The code below will return the listings status */
            $status = getStatus($row['DatePFOAccept'], $row['DatePFOEndAccept']);   

            
            /** this code is retrieving the highest bid of the auction and returning it **/
            $maxBid = getHighBid($row['PropertyID']);   
            
            if($maxBid == '')
            {
                $maxBid = '<font class="greyTextArea" style="float:right;">$'.$row['StartingBid'].'</font>';
            }
            
            
            echo '<font style="float:right; position:relative; right:20px;">
                    '
                   .$timeString
                   .$status
                   .$maxBid.
                '</font><br/>
        <table id="houseListing">
            <img class="mainPhoto" style="float:left; position: relative; margin:-150px -150px; left:145px; top:140px;" src='.  getMainThumbPath($row['PropertyID']).' alt="Main Photo" />
            <tr>
                <td width="102px;" rowspan="5">
                    
                </td>
                <td colspan="2" width="600px">
                    <b>'. $row['Address'] . " - " . $row['PropertyID'] . " - " . '<a href="Http://www.google.com/maps?q='. $row['Address'] . ' ' . $row['City'] . ' ' . $row['State'] .'" >Map It</a> - Print Brochure</b>
                </td>
                <td align="center" class="redBackground" colspan="2">
                    Current Bids
                </td>
            </tr>
            <tr>
                
                
                <td width="350px" rowspan="4" style="vertical-align: top; border-bottom:none;">
                    '.substr($row['Description'], 0, 150).'<br/><br/><a href="homeListing.php?listingID='.$row['PropertyID'].'" class="button">View Listing</a>
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
   
                <td rowspan="3" width="275px" style="padding:0 0 0 0; vertical-align:top;">
                    <table id="innerTable">
                        <tr>
                            <td align="right">
                                <b>Bedrooms:</b>
                            </td>
                            <td>
                                '. ' ' .$row['Bedroom'] .'
                            </td>
                            <td align="right">
                                <b>Bathrooms:</b> 
                            </td>
                            <td>
                                '. ' ' .$row['Bath'] .'
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <b>Square Feet:</b>
                            </td>
                            <td>
                                '. ' ' .$row['SF'] .'
                            </td>
                            <td align="right">
                                <b>Heat:</b> 
                            </td>
                            <td>
                                '. ' ' .$row['Heating'] .'
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <b>Air:</b>
                            </td>
                            <td>
                                '. ' ' .$row['AC'] .'
                            </td>
                            <td align="right">
                                <b>Media:</b> 
                            </td>
                            <td>
                                '. ' ' .$row['Media'] .'
                            </td>
                        </tr>
                    </table>
                </td>
                    ';

            
            
            
            $bids = mysql_query("SELECT * FROM BID
                            INNER JOIN AUCTION
                            ON AUCTION.AuctionID=BID.AuctionID
                            INNER JOIN APPLICATION
                            ON APPLICATION.ApplicationID=BID.ApplicationID
                            INNER JOIN USER
                            ON USER.UserID=APPLICATION.UserID
                            WHERE AUCTION.AuctionID='$auctionID' AND PropertyID='$row[PropertyID]'
                            ORDER BY MonthlyRate DESC");
                        $max = 0;
                        
                        
                        while($bid = mysql_fetch_array($bids))//while there are bids
                        {
                            if($max == 0)
                            {
                            echo  '<td>' . $bid['UserName'] . '</td>' . 
                                   '<td>$'.$bid['MonthlyRate']. "</td></tr>";
                            $max += 1;
                            }
                            else
                            {
                               echo  '<tr><td>' . $bid['UserName'] . '</td>' . 
                                   '<td>$'.$bid['MonthlyRate']. "</td></tr>";
                            $max += 1; 
                            }
                            if($max > 2)
                            {
                                break;
                            }
                        }
                        while($max <= 2)//while there is still empty space in the table
                        {
                            if($max == 0)
                            {
                                echo '<td height="19px" ></td><td></td></tr>';
                                $max += 1;
                               
                            }
                            else
                            {
                                echo '<tr><td height="19px" ></td><td></td></tr>';
                                $max += 1;
                            }
                        }



            echo '
        </table>
        ';

            
            mysql_close();
        }
    
    /**
     * This function will display the listings on the Landlords MyHood page 
     * 
     * @param String $propertyID This variable is the PropertyID of the User that will be displayed
     *  
     * @author David Pyle <Pyledw@Gmail.com>
     */
    function displayMyListings($propertyID)
        {

        
        
        echo '<link rel="stylesheet" type="text/css" href="css/homeListing.css" /><!--Link to Main css file -->';//needed stylesheet for the html elements
        
        include_once 'config.inc.php';//needed configuration functions
        include_once 'imageFunctions.php';

            $con = get_dbconn("");//creating the DB conneciton

            //this code is retrieving the highest bid of the auction and returning it
            $result = mysql_query("SELECT * FROM PROPERTY
                WHERE PropertyID='$propertyID'
                    ORDER BY DatePFOEndAccept ASC");
            
            $row = mysql_fetch_array($result);
            
            $result2 = mysql_query("SELECT * FROM AUCTION
                WHERE PropertyID='$propertyID'
                    ORDER BY DatePFOEndAccept ASC");
            
            $row2 = mysql_fetch_array($result2);
            
            $bid = mysql_query("SELECT * FROM BID
                WHERE AuctionID='".$row2['AuctionID']."' AND IsActive='1' AND IsMoveInNowBid='1'");
            
            $moveInNow = '';
            if(mysql_num_rows($bid) != '0')
            {
                //echo 'mysql_num_rows($bid)';
                $moveInNow = '<font class="redTextArea">You have a move in now PFO.  Click below to review PFOs</font>';
            }
            
            if(!$result)
            {
                die('could not connect: ' .mysql_error());
            }
            
            
            
            
            //echo $row[PropertyID];
            //echo $row[PageCompleted];
            //echo $row[IsPaid];
            
            $expire = strtotime('+ 3 day', strtotime($row['DatePFOEndAccept']));
            $end = strtotime($row['DatePFOEndAccept']);
            $now = strtotime(date("Y-m-d H:i:s"));  //converting times to str
            
            //echo 'EXPIRE->'. $row[DatePFOEndAccept] . " END->" . date("m/d/Y h:i:s A T",$end) . " NOW->" . date("m/d/Y h:i:s A T",$now) . ' DATEEND->' . $row2[DatePFOEndAccept];
            
            
            
            $hasExpired = "";
            if($row2['DatePFOEndAccept'] != "")
            {
                if($end < $now)
                    {
                        if($expire < $now)
                        {
                            
                            $hasExpired = 'Listing is past PFO experation.  You may repost listing by clicking <a href="relistRedirect.php?propertyID='.$row['PropertyID'].'">Repost</a>';
                        }
                        else
                        {
                            $hasExpired = 'You have 36 hours to choose a winner before all bids are released.';
                        }
                    }
            }
            
            $propertyStatus ="";
            if($row['IsApproved'] == 0)//check to see if the property is approved
            {
                if($row['IsPaid'] == 0)//check to see if the property has been paid
                    {
                            if($row['PageCompleted'] != 6)//check to see if the listing was completed
                            {
                                $propertyStatus = '<font class="redTextArea">Lisitng not complete.  Click edit listing below to finish your listing</font>';
                            }
                            else//if the property has not been completed
                            {
                                $propertyStatus = "<font class='redTextArea'>You must pay your fee click <a href='payListingFee.php?propertyID=".$row['PropertyID']."'>Here</a></font>";
                            }
                }
                else//if the property fee has not been paid
                {
                    if($row['PageCompleted'] != 6)//check to see if the listing was completed
                            {
                                $propertyStatus = '<font class="redTextArea">Lisitng not complete.  Click edit listing below to finish your listing</font>';
                            }
                            else
                            {
                                $propertyStatus = "<font class='redTextArea'>Your listing is awaiting approval</font>";
                            }
                }
            }
            
            
            
            include_once 'listingFunctions.php';//needed lisgin functions
            
            $timeString = getTime($row2['DatePFOAccept'], $row2['DatePFOEndAccept']);//below is call to function that returns the timestring of time remaining or time till start

            
            $status = getStatus($row2['DatePFOAccept'], $row2['DatePFOEndAccept']);//The code below will return the listings status

            $maxBid = getHighBid($row2['PropertyID']);//this code is retrieving the highest bid of the auction and returning it
            
            if($maxBid == '')
            {
                $maxBid = '<font class="greyTextArea" style="float:right;">$'.$row2['StartingBid'].'</font>';
            }
            
            echo '<font style="float:right; position:relative; right:20px;">
                  '.$moveInNow
                   .$hasExpired
                   .$propertyStatus
                   .$timeString
                   .$status
                   .$maxBid.
                '</font><br/>
        <table id="houseListing">
            <img class="mainPhoto" style="float:left; position: relative; margin:-150px -150px; left:145px; top:140px;" src='.  getMainThumbPath($row['PropertyID']).' alt="Main Photo" />
            <tr>
                <td width="102px;" rowspan="5">
                    
                </td>
                <td colspan="2" width="600px">
                    <b>'. $row['Address'] . " - " . $propertyID . " - " . '<a href="Http://www.google.com/maps?q='. $row['Address'] . ' ' . $row['City'] . ' ' . $row['State'] .'" >Map It</a> - Print Brochure</b>
                </td>
                <td align="center" class="redBackground" colspan="2">
                    Current Bids
                </td>
            </tr>
            <tr>';
            
            //setting the page completed in case the full listing has been completed
            if($row['PageCompleted'] != "6")//if the page completed was not equal to 6
            {
                $pageCompleated=$row['PageCompleted'];
            }
            else//if the page was equal to 6
            {
                $pageCompleated="1";
            }
            
            
            echo'
                <td width="350px" rowspan="4" style="vertical-align: top; border-bottom:none;">
                    '.substr($row['Description'], 0, 150).'<br/><br/>
                        ';
            if($row['IsApproved'] == 0)
            {
                echo'
                        <form class="buttonForm" method="POST" action="newListing'.$pageCompleated.'.php">
                        <input type="text" name="propertyID" style="Display:none" value="' . $propertyID . '" />
                        <button type="submit" class="button">Edit Listing</button>
                        </form>
                    ';
            }
            if(mysql_num_rows($bid) != '0')
                {
                    echo'
                    <a href="reviewPFOs.php?propertyID='. $propertyID . '&auctionID='.$row2['AuctionID'].'" rel="facebox" class="button">Review PFOs</a>
                    ';
                }

                $intStatus = getStatusInt($row2['DatePFOEndAccept'], $propertyID);
                //echo $intStatus;
                if($intStatus == '3')
                {
                    
                   $win = mysql_query("SELECT ApplictionID FROM BID
                       WHERE IsWinningBid='1' AND AuctionID='".$row2['AuctionID']."'");
                   
                   if(!$win)
                    {
                        die('could not connect: ' .mysql_error());
                    }
            
                   if(mysql_num_rows($win) != '0')
                   {
                   
                   $winner = mysql_fetch_array($win);
                   $winnerID=$winner['ApplicationID'];
                   $won = true;
                   }
                   
                       
                   
                   if($won)//Check if the auciton winner has been selected
                    {
                        echo'
                        <a href="viewApplication.php?applicationID='.$winnerID.'" rel="facebox" class="button">Review Choosen Application</a>
                        ';
                    }
                    else//if no winner has been selected yet
                    {
                        echo'
                        <a href="reviewPFOs.php?propertyID='. $propertyID . '&auctionID='.$row2['AuctionID'].'" rel="facebox" class="button">Review PFOs</a>
                        ';
                    } 
                }
                
                
                echo'
                <a href="printFlyer.php?propertyID='. $propertyID . '" class="button">Print Flyer</a>
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
   
                <td rowspan="3" width="275px" style="padding:0 0 0 0; vertical-align:top;">
                    <table id="innerTable">
                        <tr>
                            <td align="right">
                                <b>Bedrooms:</b>
                            </td>
                            <td>
                                '. ' ' .$row['Bedroom'] .'
                            </td>
                            <td align="right">
                                <b>Bathrooms:</b> 
                            </td>
                            <td>
                                '. ' ' .$row['Bath'] .'
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <b>Square Feet:</b>
                            </td>
                            <td>
                                '. ' ' .$row['SF'] .'
                            </td>
                            <td align="right">
                                <b>Heat:</b> 
                            </td>
                            <td>
                                '. ' ' .$row['Heating'] .'
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <b>Air:</b>
                            </td>
                            <td>
                                '. ' ' .$row['AC'] .'
                            </td>
                            <td align="right">
                                <b>Media:</b> 
                            </td>
                            <td>
                                '. ' ' .$row['Media'] .'
                            </td>
                        </tr>
                    </table>
                </td>
                ';
            
            
            
            $bids = mysql_query("SELECT * FROM BID
                            INNER JOIN AUCTION
                            ON AUCTION.AuctionID=BID.AuctionID
                            INNER JOIN APPLICATION
                            ON APPLICATION.ApplicationID=BID.ApplicationID
                            INNER JOIN USER
                            ON USER.UserID=APPLICATION.UserID
                            WHERE AUCTION.AuctionID='$row2[AuctionID]' AND PropertyID='$row[PropertyID]'
                            ORDER BY MonthlyRate DESC");
                        $max = 0;
                        
                        while($bid = mysql_fetch_array($bids))//while there are bids
                        {
                            if($max == 0)
                            {
                            echo  '<td>' . $bid['UserName'] . '</td>' . 
                                   '<td>$'.$bid['MonthlyRate']. "</td></tr>";
                            $max += 1;
                            }
                            else
                            {
                               echo  '<tr><td>' . $bid['UserName'] . '</td>' . 
                                   '<td>$'.$bid['MonthlyRate']. "</td></tr>";
                            $max += 1; 
                            }
                            if($max > 2)
                            {
                                break;
                            }
                        }
                        while($max <= 2)//while there is still empty space in the table
                        {
                            if($max == 0)
                            {
                                echo '<td height="19px" ></td><td></td></tr>';
                                $max += 1;
                               
                            }
                            else
                            {
                                echo '<tr><td height="19px" ></td><td></td></tr>';
                                $max += 1;
                            }
                        }


            echo '
        </table>
        ';
            
        }
        
    /**
     * This function will display the listings on the Tenants MyHood page 
     * 
     * @param String $propertyID This variable is the PropertyID of the Property that will be displayed
     *  
     * @author David Pyle <Pyledw@Gmail.com>
     */
    function displayMyPFOs($propertyID)
    {
        echo '<link rel="stylesheet" type="text/css" href="css/homeListing.css" /><!--Link to Main css file -->';
        include_once 'config.inc.php';
        include_once 'imageFunctions.php';

            $con = get_dbconn("");

            //this code is retrieving the highest bid of the auction and returning it
            $result = mysql_query("SELECT * FROM AUCTION
                INNER JOIN PROPERTY
                ON AUCTION.PropertyID=PROPERTY.PropertyID
                WHERE PROPERTY.PropertyID='$propertyID'");

            $row = mysql_fetch_array($result);

            include_once 'listingFunctions.php';
            
            //below is call to function that returns the timestring of time remaining or time till start
            $timeString = getTime($row['DatePFOAccept'], $row['DatePFOEndAccept']);

            //The code below will return the listings status
            $status = getStatus($row['DatePFOAccept'], $row['DatePFOEndAccept']);

            //this code is retrieving the highest bid of the auction and returning it

            $maxBid = getHighBid($row['PropertyID']);
            
            if($maxBid == '')
            {
                $maxBid = '<font class="greyTextArea" style="float:right;">$'.$row['StartingBid'].'</font>';
            }
            
            
            echo '<font style="float:right; position:relative; right:20px;">
                    '
                   .$timeString
                   .$status
                   .$maxBid.
                '</font><br/>
        <table id="houseListing">
            <img class="mainPhoto" style="float:left; position: relative; margin:-150px -150px; left:145px; top:140px;" src="<?php echo $row[ImagePathPrimary]; ?>" alt="Main Photo" />
            <tr>
                <td width="102px;" rowspan="5">
                    
                </td>
                <td colspan="2" width="600px">
                    <b>'. $row['Address'] . " - " . $row['PropertyID'] . " - " . '<a href="Http://www.google.com/maps?q='. $row['Address'] . ' ' . $row[City] . ' ' . $row['State'] .'" >Map It</a> - Print Brochure</b>
                </td>
                <td align="center" class="redBackground" colspan="2">
                    Current Bids
                </td>
            </tr>
            <tr>
                
                
                <td width="350px" rowspan="4" style="vertical-align: top; border-bottom:none;">
                    '.substr($row['Description'], 0, 150).'<br/><br/>
                     <a rel="facebox" href="rentItNow.php?auctionID='.$row['AuctionID'].'" class="button">Move In Now at $'.$row['RentNowRate'].'</a>
                     <a href="homeListing.php?listingID='. $row['PropertyID'] . '" class="button">View Listing</a>
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
   
                <td rowspan="3" width="275px" style="padding:0 0 0 0; vertical-align:top;">
                    <table id="innerTable">
                        <tr>
                            <td align="right">
                                <b>Bedrooms:</b>
                            </td>
                            <td>
                                '. ' ' .$row['Bedroom'] .'
                            </td>
                            <td align="right">
                                <b>Bathrooms:</b> 
                            </td>
                            <td>
                                '. ' ' .$row['Bath'] .'
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <b>Square Feet:</b>
                            </td>
                            <td>
                                '. ' ' .$row['SF'] .'
                            </td>
                            <td align="right">
                                <b>Heat:</b> 
                            </td>
                            <td>
                                '. ' ' .$row['Heating'] .'
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <b>Air:</b>
                            </td>
                            <td>
                                '. ' ' .$row['AC'] .'
                            </td>
                            <td align="right">
                                <b>Media:</b> 
                            </td>
                            <td>
                                '. ' ' .$row['Media'] .'
                            </td>
                        </tr>
                    </table>
                </td>
                 ';
            
            //This query is retriving all the bids on the auction of the property
            $auction = mysql_query('SELECT AuctionID FROM AUCTION
                WHERE propertyID="'.$propertyID.'"
                ORDER BY AuctionID DESC');
            
            $auctionInfo = mysql_fetch_array($auction);
            
            
            
            $bids = mysql_query("SELECT * FROM BID
                            INNER JOIN AUCTION
                            ON AUCTION.AuctionID=BID.AuctionID
                            INNER JOIN APPLICATION
                            ON APPLICATION.ApplicationID=BID.ApplicationID
                            INNER JOIN USER
                            ON USER.UserID=APPLICATION.UserID
                            WHERE AUCTION.AuctionID='$auctionInfo[AuctionID]' AND PropertyID='$row[PropertyID]'
                            ORDER BY MonthlyRate DESC");
                        $max = 0;
                        while($bid = mysql_fetch_array($bids))//while there are bids
                        {
                            if($max == 0)
                            {
                            echo  '<td>' . $bid['UserName'] . '</td>' . 
                                   '<td>$'.$bid['MonthlyRate']. "</td></tr>";
                            $max += 1;
                            }
                            else
                            {
                               echo  '<tr><td>' . $bid['UserName'] . '</td>' . 
                                   '<td>$'.$bid['MonthlyRate']. "</td></tr>";
                            $max += 1; 
                            }
                            if($max > 2)
                            {
                                break;
                            }
                        }
                        while($max <= 2)//while there is still empty space in the table
                        {
                            if($max == 0)
                            {
                                echo '<td height="19px" ></td><td></td></tr>';
                                $max += 1;
                               
                            }
                            else
                            {
                                echo '<tr><td height="19px" ></td><td></td></tr>';
                                $max += 1;
                            }
                        }



            echo '
        </table>
        ';
    }
    
    
    /**
     * This funciton will test the user using the given UserID and PropertyID
     * 
     * * It will determin the users ability to bid and return an integer to represent their status
     * * 0 - Okay to bid, no other active bids
     * * 1 - Application not compleate
     * * 2 - Applicaiton not authorized
     * * 3 - Bid fee not paid
     * * 4 - Another bid is active on a differant auction
     * * 5 - No application on file
     * 
     * @param String $userID This is the userID of the user
     * 
     * @param String $property This is the property ID of the orioerty in question
     * 
     * @return String $status of the users ability to BID with HTML styling elements
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    function getUsersBidStatus($userID,$propertyID)
        {

            include_once 'config.inc.php';
            $status = "0";
            $ActiveBids = false;

            $con = get_dbconn("");

            $result = mysql_query("SELECT * FROM APPLICATION
            WHERE APPLICATION.UserID = '$userID'
            ");


            if(!$result)
                 {
                     die('could not connect: ' .mysql_error());
                 }
            $row = mysql_fetch_array($result);
            
            
            
            if(mysql_num_rows($result) == 0)
                {
                    $status = "5";
                }
            else 
                {
                    
                    if($row['PageCompleted'] != 6)
                    {
                        
                        $status = 1;
                    }
                    elseif($row['IsPaid'] == 0)
                    {
                        $status = 3;
                    }
                    elseif($row['IsApproved'] == 0)
                    {
                        $status = 2;
                    }
                    else
                    {
                        $applicationID = $row['ApplicationID'];
                        $result = mysql_query("SELECT * FROM BID
                            INNER JOIN AUCTION
                            ON AUCTION.AuctionID=BID.AuctionID
                            INNER JOIN PROPERTY
                            ON AUCTION.PropertyID=PROPERTY.PropertyID
                            WHERE BID.ApplicationID='$applicationID]'");
                        
                        while($row = mysql_fetch_array($result))
                        {
                            if($row['PropertyID'] != $propertyID && $row['IsActive'] == "1")
                            {
                                $ActiveBids = true;
                                break;
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
                    }
                }

            return $status;


        }
        
        
        /**
         * This function returns the date and time of the date from the database so that it looks better.
         * 
         * @param string $date Date to be converted
         * 
         * @param int $hasTime Integer that test if the date has time attached if 0, no time is attached, if 1 time is attached 
         * 
         * @author David Pyle <Pyledw@Gmail.com>
         */
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
    
        
        /**
         * This function will display basic info from a users applicaiton for that administrator
         * 
         * @param Array $row Is the row from the query with the application info
         * 
         * @author David Pyle <Pyledw@Gmail.com>
         */
        function displayApplications($row)
        {
            echo '<table class="tableForm" style="padding:5px 5px 0px 5px; margin:0px 0px 0px 0px;" width="1000">
                        <tr>
                            <td colspan="1">
                                <b>'.$row['ApplicationID'].' - '.$row['LastName'].', '.$row['FirstName'].'</b>
                            </td>
                            <td>
                                <a class="button" href="viewApplication.php?applicationID='.$row['ApplicationID'].'" rel="facebox" >View Application</a></div><br/><br/>
                            </td>
                        </tr>
                </table>';
        }
        
        /**
         * This function displays the listings based of the given array of elements
         * 
         * @param Array $row
         * 
         * @author David Pyle <Pyledw@Gmail.com>
         */
        function displayListings($row)
        {
            echo '<table class="tableForm" style="padding:0px 5px 5px 5px; margin:0px 0px 0px 0px;" width="1000">
                        <tr>
                            <td colspan="2">
                                <b>'.$row['PropertyID'].' - '.$row['LastName'].', '.$row['FirstName'].'</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address:'.$row['Address'] .', '.$row['City'].' ' . $row['State'] . ' '.$row['ZipCode'] .'
                            </td>
                            <td>
                                <a class="button" href="viewProperty.php?propertyID='.$row['PropertyID'].'" rel="facebox" >View Property</a>
                            </td>
                        </tr>
                </table>';
        }
    
    
    
?>
