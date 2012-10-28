<div id="mainContent">
    <h1>Application Status</h1>
    <?php
        //check for application status return color and information
        
        require "config.inc.php";
         
        $con = mysql_connect($db_server,$db_user,$db_pass );
        if(!$con)
        {
            die('could not connect: ' .mysql_error());
        }
        else
        {
            //echo "connected to mySQL";
        }
        $select = mysql_selectdb($db_database, $con);
        if(!$select)
        {
            die('could not connect: ' .mysql_error());
        }
        else
        {
            //echo "Selected Database";
        }
        $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='" . $_SESSION[userID] . "'");
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        $isapproved = false;
        $row = mysql_fetch_array($result);
        
        //echo $row['IsApproved'];
        //echo $row['UserID'];
        
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
                echo '
                <div>
                    <div style="float:left; margin: 0px 5px 0px 5px;width:60px;background:red;height:20px;">

                    </div>
                    Your application has not yet been approved.  An administrator will review your application and approve it shortly.<br />
                    <a href="editApplication.php">Edit Your Application</a>
                </div>';
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
    $result2 = mysql_query("SELECT * FROM BID
            INNER JOIN AUCTION
            ON AUCTION.AuctionID=BID.AuctionID
            INNER JOIN PROPERTY
            ON PROPERTY.PropertyID=AUCTION.PropertyID
            INNER JOIN APPLICATION
            ON APPLICATION.ApplicationID=BID.ApplicationID
            WHERE APPLICATION.UserID='" . $_SESSION[userID] . "'
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
            <font class="greyTextArea" style="float:right;">Status:Show Period Closed</font>
            <font class="greyTextArea" style="float:right;">Current Rent:$1,500</font>
            <font class="redTextArea" style="float:right;">Ends in: ' . $years . ' Years, ' . $days . ' Days, ' . $hours . ' Hours, ' . $mins . ' Minutes</font>
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
            Bids<br/>
            Bidder ID ---  Price of Bid --- Date
            ' .//This will be where we pull from the bids table to show the bids on the property
            '
        </div>
        <div class="column3">
            '.$row2[Description].'
        </div>
        <div class="column4">
            Next Open House<br/>
            '.$row2[DateTimeOpenHouse1].'<br/>
            '.$row2[DateTimeOpenHouse2].'
        </div>
        
        <div class="footer">
        <form class="buttonForm" method="post" action="newListing1.php">
            <input type="text" name="propertyID" style="Display:none" value="' . $row2[PropertyID] . '" />
            <button class="button">Edit Listing</button>
        </form>
        <form class="buttonForm" method="post" action="reviewPFOs.php">
            <input type="text" name="propertyID" style="Display:none" value="' . $row2[PropertyID] . '" />
            <button class="button">Review PFOs</button>
        </form>
        <form class="buttonForm" method="post" action="printFlyer.php">
            <input type="text" name="propertyID" style="Display:none" value="' . $row2[PropertyID] . '" />
            <button class="button">Print Flyer</button>
        </form>
        </div>
        </div>
    </div>';
    }
    
    ?>
    <div id="myHoodListing">
        <div class="header">
            <font class="redTextArea" style="float:right;">Action Ends</font>
            <font class="greenTextArea" style="float:right;">Current Bid</font>
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
            <a class="button">Move in now at:$price</a>
            <a class="button">Change my PFO</a>
            <a class="button">Contact Landlord</a>
        </div>
        </div>
        
    </div>
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
