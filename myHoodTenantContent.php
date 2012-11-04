<!--  This content is shown if the user is determined to be a Tenant. It will then 
      show them all the active properties that they have bids on.  It also show the 
      Status of their application, and if they still need to pay their fee.-->


<div id="mainContent">
    <h1>Application Status</h1>
    <?php
        //check for application status return color and information
        
        require_once "config.inc.php";
         
	$con = get_dbconn("");
        $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='" . $_SESSION[userID] . "'");
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        $row = mysql_fetch_array($result);
        
        //echo $row['IsApproved'];
        //echo $row['UserID'];
        
        
        
        //The below if statments are testing to see what point the applicaiton is at.
        //It checks to see if it has been approved, then if it has been paid, and finally
        //it checks to see if it was compleated.
        if($row['IsApproved'] == 'Y')
        {
            echo '
        <div>
            <div style="float:left; margin: 0px 5px 0px 5px;width:60px;background:green;height:20px;">

            </div>
            You are free to submit a Proposal for Occupancy.<br/>
            <a href="editApplication.php">Edit Your Application</a>
        </div>';
        }
        else
        {
            if($row[PageCompleted] == "6")
            {
                if($row[IsPaid] == "0")
                   {
                    echo '<div>
                               <div style="float:left; margin: 0px 5px 0px 5px;width:60px;background:orange;height:20px;">
                               </div>
                                Your Application has been compleated, but you must pay the applicaiton fee <br/> before
                                your applicaiton will be reviewed by an administrator.  Please click <a href="payApplicationFee.php">HERE</a> to pay your fee.
                          </div>';
                   }
                else
                   {
                     echo '
                           <div>
                               <div style="float:left; margin: 0px 5px 0px 5px;width:60px;background:red;height:20px;">

                                    </div>
                                    Your application has not yet been approved.  An administrator will review your application and approve it shortly.<br />
                                    <a href="editApplication.php">Edit Your Application</a>
                                </div>';
                   }
                        
            }
            else
            {
                echo '
                <div>
                    <div style="float:left; margin: 0px 5px 0px 5px;width:60px;background:yellow;height:20px;">

                    </div>
                    Your application has not yet been compleated, please click to finish your application<br />
                    <a href="editApplication.php">Edit Your Application</a>
                </div>';
            }
        }
            
        
    ?>
    <br/>
    Based on your application, you are most likely to be considered for the following maximum monthly rent :
    <font class="tanTextArea">Number would go here</font>

    
    <h1>My PFOs</h1>
    <?php
        
    //pulling the data from the database and returning the PFO
    $result2 = mysql_query("SELECT * FROM PROPERTY
            INNER JOIN AUCTION
            ON AUCTION.PropertyID=PROPERTY.PropertyID
            INNER JOIN BID
            ON BID.AuctionID=AUCTION.AuctionID
            INNER JOIN APPLICATION
            ON BID.ApplicationID=APPLICATION.ApplicationID
            INNER JOIN USER
            ON APPLICATION.UserID=USER.UserID
            WHERE USER.UserID = '$_SESSION[userID]'
            ");
    
    
    While($row2 = mysql_fetch_array($result2))
    {
        $ends = strtotime($row2[DatePFOEndAccept]);
        $now = strtotime(date("Y-m-d H:i:s"));
        

        $difference = $ends - $now;
        $years = abs(floor($difference / 31536000));
        $days = abs(floor(($difference-($years * 31536000))/86400));
        $hours = abs(floor(($difference-($years * 31536000)-($days * 86400))/3600));
        $mins = abs(floor(($difference-($years * 31536000)-($days * 86400)-($hours * 3600))/60));#floor($difference / 60);
        
        
        echo '    <div id="myHoodListing">
        <div class="header">
            <font class="greyTextArea" style="float:right;">Status:Accepting Bids</font>
            <font class="greyTextArea" style="float:right;">Current Rent: $'. $row2[MonthlyRate] . '</font>
            <font class="redTextArea" style="float:right;">Ends in: ' . $days . ' Days, ' . $hours . ' Hours, ' . $mins . ' Minutes</font>
        </div>
        
        <div class="content">
        <image class="PFOimage" src="#" />
        <div class="column1">
           '.$row2[Address].'<br/>
           '.$row2[City].'<br/>
           '.$row2[State].'<br/>
           '.$row2[Zip].'<br/>
           '.$row2[PropertyID].'
        </div>
        <div class="column2">
            Bidder ID ---  Price of Bid --- Date <br/>
            ';
        
                    
                    $result3 = mysql_query("SELECT * FROM BID
                        INNER JOIN AUCTION
                        ON AUCTION.AuctionID=BID.AuctionID
                        INNER JOIN APPLICATION
                        ON APPLICATION.ApplicationID=BID.ApplicationID
                        INNER JOIN USER
                        ON USER.UserID=APPLICATION.UserID
                        WHERE PropertyID='$row2[PropertyID]'
                        ORDER BY MonthlyRate DESC");
                    
                    $max = 0;
                    while($row3 = mysql_fetch_array($result3))
                    {
                        echo  $row3[UserName] . " " . 
                            $row3[MonthlyRate]. " " . $row3[TimeReceived] .'<br/> ';
                        $max += 1;
                        if($max > 3)
                        {
                            break;
                        }
                    }
                    
                    
                    
         
                
            
        echo '</div>
            <div class="column3">
            DESCRIPTION<br/>
            
        </div>
        <div class="column4">
            Next Open House<br/>
            '.$row2[DateTimeOpenHouse1].'<br/>
            '.$row2[DateTimeOpenHouse2].'
        </div>
        
        <div class="footer">
        <div class="footer">
            <a class="button">Move in now at:$price</a>
            <a href="changeMyPFO.php?bidID='. $row2[BidID] . '" class="button" rel="facebox">Change my PFO</a>
            <a class="button">Contact Landlord</a>
        </div>
        </div>
        </div>
    </div>';
        //added a break to ensure that only one property will be displayed
        break;
    }
    
    ?>
    <h1>My Favorites</h1>
        <?php
    //pulling the data from the database and returning the PFO
    ?>
    <div id="myHoodListing">
        <div class="header">
            <font class="auctionEnding">Action Ends</font>
            <font class="currentBid">Current Bid</font>
        </div>
        
        <div class="content">
        <image class="PFOimage" src="#" />
        <div class="column1">
            This will contain street address but will run over<br/>
            City<br/>
            state<br/>
            zip<br/>
            ID CODE<br/>
        </div>
        <div class="column2">
            My bid<br/>
            time submitted</br>
            <a>See old bids</a>
        </div>
        <div class="column3">
            Some details<br/>
            number of rooms<br/>
            SQ footage<br/>
            Bathrooms
        </div>
        <div class="column4">
            Open House Details</br>
            Next Date:
        </div>
        
        <div class="footer">
            <a class="button">Submit a PFO</a>
            <a class="button">MOVE IN NOW</a>
            <a class="button">Contact Landlord</a>
        </div>
        </div>
        
    </div>

    
    <div id="myHoodListing">
        <div class="header">
            <font class="auctionEnding">Action Ends</font>
            <font class="currentBid">Current Bid</font>
        </div>
        
        <div class="content">
        <image class="PFOimage" src="#" />
        <div class="column1">
            This will contain street address but will run over<br/>
            City<br/>
            state<br/>
            zip<br/>
            ID CODE<br/>
        </div>
        <div class="column2">
            My bid<br/>
            time submitted</br>
            <a>See old bids</a>
        </div>
        <div class="column3">
            Some details<br/>
            number of rooms<br/>
            SQ footage<br/>
            Bathrooms
        </div>
        <div class="column4">
            Open House Details</br>
            Next Date:
        </div>
        
        <div class="footer">
            <a class="button">Submit a PFO</a>
            <a class="button">MOVE IN NOW</a>
            <a class="button">Contact Landlord</a>
        </div>
        </div>
        
    </div>
    
    <h1>My Saved Searches</h1>
    <?php
    //Populated by PHP the recent searches made by the tenant
    ?>
    
    
    
</div>
