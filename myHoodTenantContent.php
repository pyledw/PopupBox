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
            You are free to submit a Proposal for Occupancy.
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
            
        
    ?>
    <br/>
    Based on your application, you are most likely to be considered for the following maximum monthly rent :
    <font class="tanTextArea">Number would go here</font>

    
    <h1>My PFOs</h1>
    <?php
    //pulling the data from the database and returning the PFO
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
