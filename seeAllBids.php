<?php
    /**
     * This popup will show all bids of a listing.  It pops up when a user selescts to see all bids
     * It will recive the Auction ID trom a form GET method and will then display the bids in decending order.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    echo "<table class='tableForm' style='margin-top:-5px;'>";
    include_once 'config.inc.php';
    //echo $_GET[auctionID];

    $con = get_dbconn("");

    $bids = mysql_query("SELECT * FROM BID
                                INNER JOIN APPLICATION
                                ON APPLICATION.ApplicationID=BID.ApplicationID
                                INNER JOIN USER
                                ON USER.UserID=APPLICATION.UserID
                                WHERE AuctionID='$_GET[auctionID]' AND IsActive='1'
                                ORDER BY MonthlyRate DESC");
                            while($bid = mysql_fetch_array($bids))
                            {
                                echo  '<tr><td>' . $bid[UserName] . '</td>' . 
                                       '<td>$'.$bid[MonthlyRate]. "</td></tr>";
                            }

    echo "</table>";
?>
