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
        
        echo '    <div id="myHoodListing">
        <div class="header">
            <font class="greyTextArea" style="float:right;">Status:Show Period Closed</font>
            <font class="greyTextArea" style="float:right;">Current Rent:$1,500</font>
            <font class="redTextArea" style="float:right;">Ends in: ' . $years . ' Years, ' . $days . ' Days, ' . $hours . ' Hours, ' . $mins . ' Minutes</font>
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
            Bids<br/>
            Bidder ID ---  Price of Bid --- Date
            ' .//This will be where we pull from the bids table to show the bids on the property
            '
        </div>
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
        <form class="buttonForm" method="post" action="reviewPFOs.php">
            <input type="text" name="propertyID" style="Display:none" value="' . $row[PropertyID] . '" />
            <button class="button">Review PFOs</button>
        </form>
        <form class="buttonForm" method="post" action="printFlyer.php">
            <input type="text" name="propertyID" style="Display:none" value="' . $row[PropertyID] . '" />
            <button class="button">Print Flyer</button>
        </form>
        </div>
        </div>
    </div>';
    }
    
    
    ?>
</div>
