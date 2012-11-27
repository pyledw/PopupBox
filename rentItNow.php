<?php
session_start();
$auctionID = $_GET['auctionID'];
//echo $auctionID;
include_once 'config.inc.php';

get_dbconn("");

$result = mysql_query("SELECT ApplicationID FROM APPLICATION
    WHERE UserID='".$_SESSION['userID']."'");
if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
$row = mysql_fetch_array($result);

$result = mysql_query("SELECT BidID FROM BID
    WHERE AuctionID='".$auctionID."' AND ApplicationID='".$row['ApplicationID']."' AND IsMoveInNowBid='1'");
if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
if(mysql_num_rows($result) == 0)
{
    echo '
        <table class="tableForm" style="margin-top:-5px;">
    <tr>
        <td colspan="2">
            Would you like to place a Move In Now?
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <a class="button" href="rentItNowRedirect.php?auctionID=<?php echo $auctionID; ?>">Confirm</a>
        </td>
    </tr>
</table>


';
}
else
{
    echo '<table class="tableForm" style="margin-top:-5px;">
    <tr>
        <td colspan="2">
            You already have a move in now bid active on this listing.<br/>  Please wait for that Landlord to accept it.
        </td>
    </tr>
</table>';
}

?>
