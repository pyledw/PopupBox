<div id="mainContent">
<h1>My Homes</h1>
    <?php
    //pulling the data from the database and returning the PFO
    
    //Creates a connection to the database and stores the connection string in $con and the Selected database in $select
    include_once 'config.inc.php';
    $connectionInfo= get_dbconn();
    $con = $connectionInfo[0];
    $select = $connectionInfo[1];
    
    //Query to select the user's application using their userID number
    $result = mysql_query("SELECT * FROM PROPERTY
        WHERE UserID ='" . $_SESSION[userID] . "'");
    if(!$result)
    {
        die('could not connect: ' .mysql_error());
    }

    //Setting the query results into a variable
    while($row = mysql_fetch_array($result))
    {
        $ends = strtotime($row[DatePFOEndAccept]);
        $now = strtotime(date("Y-m-d H:i:s"));
        

        $difference = $ends - $now;
        $years = abs(floor($difference / 31536000));
        $days = abs(floor(($difference-($years * 31536000))/86400));
        $hours = abs(floor(($difference-($years * 31536000)-($days * 86400))/3600));
        $mins = abs(floor(($difference-($years * 31536000)-($days * 86400)-($hours * 3600))/60));#floor($difference / 60);
        
        if($row[IsApproved] == 0 && $row[IsPaid] == 1)
        {
            echo '<font class="yellowTextArea">This listing has not yet been approved</font>';
        }
        if($row[IsPaid] == 0)
        {
            echo '<font class="redTextArea">You have not yet paid your fee.  Please go<a href="payListingFee.php?propertyID='. $row[PropertyID] .'"> HERE</a> to pay your fee to activate your lisitng.</font>';
        }
        
        echo '    <div id="myHoodListing">
        <div class="header">
            <font class="greyTextArea" style="float:right;">Status:Show Period Closed</font>
            <font class="greyTextArea" style="float:right;">Current Rent:$1,500</font>
            <font class="redTextArea" style="float:right;">Ends in: ' . $days . ' Days, ' . $hours . ' Hours, ' . $mins . ' Minutes</font>
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
            '.$row[Description].'
        </div>
        <div class="column4">
            Next Open House<br/>
            '.$row[DateTimeOpenHouse1].'<br/>
            '.$row[DateTimeOpenHouse2].'
        </div>
        
        <div class="footer">
        <form class="buttonForm" method="post" action="newListing1.php">
            <input type="text" name="propertyID" style="Display:none" value="' . $row[PropertyID] . '" />
            <button class="button">Edit Listing</button>
        </form>
        
        <a href="reviewPFOs.php?propertyID='. $row[PropertyID] . '" rel="facebox" class="button">Review PFOs</a>
            
        <a href="printFlyer.php?propertyID='. $row[PropertyID] . '" class="button">Print Flyer</a>
        </div>
        </div>
    </div>';
    }
    
    
    ?>
</div>
