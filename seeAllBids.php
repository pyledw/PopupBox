<?php
echo "<table class='tableForm'>";
include_once 'config.inc.php';

$con = get_dbconn("");

$bids = mysql_query("SELECT * FROM BID
                            INNER JOIN AUCTION
                            ON AUCTION.AuctionID=BID.AuctionID
                            INNER JOIN APPLICATION
                            ON APPLICATION.ApplicationID=BID.ApplicationID
                            INNER JOIN USER
                            ON USER.UserID=APPLICATION.UserID
                            WHERE PropertyID='$row[PropertyID]'
                            ORDER BY MonthlyRate DESC");
                        while($bid = mysql_fetch_array($bids))
                        {
                            echo  '<tr><td>' . $bid[UserName] . '</td>' . 
                                   '<td>$'.$bid[MonthlyRate]. "</td></tr>";
                        }
                        
echo "</table>";
?>
