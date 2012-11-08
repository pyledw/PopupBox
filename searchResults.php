<?php
        $title = "Search Homes";
	include 'Header.php';

        
        
        if(isset($_COOKIE['searchType']))
        {
            $type = $_COOKIE['searchType'];
            $val = $_COOKIE['searchVal'];
        }
        else
        {
            header( 'Location: /searchHomes.php' );
        }
        
        
?>
<h1 class="Title">Home Search Results</h1>
<hr class="Title" />
<div id="mainContent">
    <?php
        
    include_once 'searchFunction.php';
    $result = search($type,$val);
    
    
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
        
        
        echo '    <div id="searchResult">
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
    }
        
    ?>
</div>

<?php
	include 'Footer.php';
?>