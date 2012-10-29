<?php
//echo $_GET[propertyID];

    include_once 'config.inc.php';
    $con = get_dbconn();
    
    //Query to select the user's application using their userID number
    $result = mysql_query("SELECT * FROM USER
        INNER JOIN APPLICATION
        ON USER.UserID=APPLICATION.UserID
        INNER JOIN BID
        ON APPLICATION.ApplicationID=BID.ApplicationID
        INNER JOIN AUCTION
        ON BID.AuctionID=AUCTION.AuctionID
        INNER JOIN PROPERTY
        ON AUCTION.PropertyID=PROPERTY.PropertyID
        WHERE PROPERTY.PropertyID='$_GET[propertyID]'
        ");
    
    
    if(!$result)
    {
        die('could not connect: ' .mysql_error());
    }
    
    While($row = mysql_fetch_array($result))
    {
        echo $row[UserName] . ' ';
        echo $row[MonthlyRate] . '
            <a class="button" href="viewApplicationPage.php?applicationID='.$row[ApplicationID].'" >View Application</a><br/><br/>';
    }
    
    
    
?>
THIS SHOULD DISPLAY ONCE I CLICK
