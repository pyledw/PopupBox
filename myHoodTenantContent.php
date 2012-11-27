<!--  This content is shown if the user is determined to be a Tenant. It will then 
      show them all the active properties that they have bids on.  It also show the 
      Status of their application, and if they still need to pay their fee.-->



    <?php
    
        /**
         * This content is shown if the user is determined to be a Tenant. 
         * 
         * It will then 
         * show them all the active properties that they have bids on.  It also show the 
         * Status of their application, and if they still need to pay their fee.
         * It finaly will show the last 4 searches that were made.
         * 
         * @author David Pyle <Pyledw@Gmail.com>
         */
    
        include_once 'config.inc.php';
        $now = strtotime(date("Y-m-d H:i:s"));
        $con = get_dbconn("");
        
        $result = mysql_query("SELECT * FROM BID
            INNER JOIN AUCTION
            ON BID.AuctionID=AUCTION.AuctionID
            INNER JOIN APPLICATION
            ON BID.ApplicationID=APPLICATION.ApplicationID
            WHERE APPLICATION.UserID ='$_SESSION[userID]'");
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
            
        include 'myHoodFunctions.php';

        updateBids($_SESSION[userID]);
        
    ?>
    <div id="mainContent">
    <h1>Application Status</h1>
    <?php
        //check for application status return color and information
        require_once "config.inc.php";
         
	$con = get_dbconn("");
        $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='$_SESSION[userID]'");
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        $row = mysql_fetch_array($result);
        
        //echo $row['IsApproved'];
        //echo $row['UserID'];
        
        
        
        //The below if statments are testing to see what point the applicaiton is at.
        //It checks to see if it has been approved, then if it has been paid, and finally
        //it checks to see if it was completed.
        if($row['IsApproved'] == '1')
        {
            echo '
        <div>
            <div style="float:left; margin: 0px 5px 0px 5px;width:60px;background:green;height:20px;">

            </div>
            You are free to submit a Proposal for Occupancy.<br/>
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
                                Your Application has been completed, but you must pay the applicaiton fee <br/> before
                                your applicaiton will be reviewed by an administrator.  Please click <a href="payApplicationFee.php">HERE</a> to pay your fee.
                                or <a href="editApplication.php">Edit Your Application</a>
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
                    Your application has not yet been completed, please click to finish your application<br />
                    <a href="editApplication.php">Edit Your Application</a>
                </div>';
            }
        }
            
        
    ?>

    <h1>My PFOs</h1>
    <?php
        
    //pulling the data from the database and returning the PFO
    $result2 = mysql_query("SELECT * FROM BID
            INNER JOIN AUCTION
            ON BID.AuctionID=AUCTION.AuctionID
            INNER JOIN PROPERTY
            ON AUCTION.PropertyID=PROPERTY.PropertyID
            INNER JOIN APPLICATION
            ON BID.ApplicationID=APPLICATION.ApplicationID
            INNER JOIN USER
            ON APPLICATION.UserID=USER.UserID
            WHERE USER.UserID = '$_SESSION[userID]'
            ");
    
    
    
    
    
    
    
    
    While($row2 = mysql_fetch_array($result2))
    {
        
       if($row2[IsWinningBid] == "1")
        {
           
            Echo 'You have been selected as the winner for this auciton!  Please click <a rel="facebox" href="viewLandlordContactInfo.php?propertyID='.$row2[PropertyID].'">here</a> to see the landlords contact info.';
        }
        include_once 'listingFunctions.php';
        
        displayMyPFOs($row2[PropertyID]);
        
    }
    
    if(isset($_SESSION['recentSearch']))
    {
        echo '<h3>Recent Searches</h3>';
    foreach (array_reverse($_SESSION['recentSearch']) as $value) 
        {
            echo "<a href='searchRedirect.php?type=".$value[0]."&term=".$value[1]."'>Searched for " . $value[1] . " by " . $value[0] . "</a><br/>";
        }
    }
    ?>
    
    
</div>
