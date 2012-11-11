<!-- this content is showed if the user is determined to be a Landlord
     This page then displays all of their listings, and their status' -->


<div id="mainContent">
<h1>My Homes</h1>
    <?php
    //pulling the data from the database and returning the PFO
    
    include_once 'config.inc.php';
    $con = get_dbconn("");

    //Query to select the user's application using their userID number
    $result = mysql_query("SELECT * FROM PROPERTY
        INNER JOIN AUCTION
        ON PROPERTY.PropertyID=AUCTION.PropertyID
        WHERE UserID ='" . $_SESSION[userID] . "'");
    if(!$result)
    {
        die('could not connect: ' .mysql_error());
    }

    //Setting the query results into a variable
    while($row = mysql_fetch_array($result))
    {
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
            <font class="greyTextArea" style="float:right;">Satus:'. $status . '</font>
            <font class="greyTextArea" style="float:right;">' . $maxBid . '</font>
            <font class="redTextArea" style="float:right;">' . $timeString . '</font>
        </div>
        
        <div class="content">
        <image class="PFOimage" src="#" />
        <div class="column1">
           '.$row[Address].'<br/>
           '.$row[City].'<br/>
           '.$row[State].'<br/>
           '.$row[Zip].'<br/>
           '.$row[PropertyID].'
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
            '.$row[Description].'
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
        
        <a href="reviewPFOs.php?propertyID='. $row[PropertyID] . '&auctionID='.$row[AuctionID].'" rel="facebox" class="button">Review PFOs</a>
            
        <a href="printFlyer.php?propertyID='. $row[PropertyID] . '" class="button">Print Flyer</a>
        </div>
        </div>
    </div>';
    }
    
    
    ?>
</div>
