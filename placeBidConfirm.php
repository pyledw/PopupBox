<!-- This window will preform validation as well as an confirmation box. -->

<?php
session_start();
$propertyID = $_GET["propertyID"];
$aucitonID = $_GET["auctionID"];
$bidAmount = $_GET["amt"];
$userID = $_SESSION[userID];

include_once 'config.inc.php';

$con = get_dbconn("");

$result = mysql_query("SELECT * FROM BID
           INNER JOIN APPLICATION
           ON BID.ApplicationID=APPLICATION.ApplicationID
           INNER JOIN USER
           ON APPLICATION.UserID=USER.UserID
           WHERE AuctionID='$aucitonID'");

 if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }

$accept = TRUE;
while($row = mysql_fetch_array($result))
{
    if($row[DatePFOEndAccept] > date())
    {
        header( 'Location: /homeListing.php?listingID='.$propertyID );
    }
    if($row[UserID] == $userID)
    {
       if($row[MonthlyRate] > $bidAmount)
       {
           echo 'Your last bid was more';
           $lastBid = $row[MonthlyRate];
           $accept = FALSE;
           break;
       }
    }
    if($row[MonthlyRate] > $bidAmount)
    {
        Echo "Your offer is lower than the highest rate.  You may continue, but consider increasing your bid";
    }
    
}
if($accept)
{
    echo '<form id="placebid" method="post" action="placeBid.php">
    <font class="greyBackground">My Proposal for occupancy</font><br/>
    <label class="label">Your Bid: '.$_GET["amt"].'</label><br/>
    <p>Are you sure you want to submit your bid?</p>
    <input type="text" style="display: none;" name="amt" value="'.$bidAmount.'" />
    <input type="text" style="display: none;" name="auctionID" value="'.$aucitonID.'" />
    <input type="text" style="display: none;" name="userID" value="'.$userID.'" />
    <input type="text" style="display: none;" name="propertyID" value="'.$propertyID.'" />
    <button class="button" type="submit">Submit</button>
    </form>';
}
else
{
    echo '<form id="placebid" method="post" action="placeBid.php">
    <font class="greyBackground">My Proposal for occupancy</font><br/>
    <label class="label">Your Bid: '.$_GET["amt"].'</label><br/>
    <label class="label">Your Highest Bid: '.$lastBid.'</label><br/>
    

    </form>';
}

?>
