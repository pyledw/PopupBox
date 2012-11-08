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
$active = TRUE;
$more = TRUE;

while($row = mysql_fetch_array($result))
{
    
    if($row[DatePFOEndAccept] > date('Y-m-d h:i:s'))
    {
        $active = FALSE;
        
    }
    if($row[UserID] == $userID)
    {
       if($row[MonthlyRate] > $bidAmount)
       {
           $lastBid = $row[MonthlyRate];
           $accept = FALSE;
           break;
       }
    }
    if($row[MonthlyRate] > $bidAmount)
    {
           $more = FALSE;
    }
}


if($accept && $active)
{

    echo '<form id="placebid" method="post" action="placeBid.php">
    <font class="greyBackground">My Proposal for occupancy</font><br/>';
    if(!$more)
        {
            echo 'You may continue, but there is a bid that is higher than yours.  Consider increasing your bid';
        }
    echo'
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
    There is an error with your bid.<br/>
    ';
    if(!$accept)
    {
        
        echo 'Your Previus Bid was higher than your current offer<br/>
       <label class="label">Your Bid: '.$_GET["amt"].'</label><br/>
        <label class="label">Your Highest Bid: '.$lastBid.'</label><br/>';
    }
    if(!$active)
    {
        echo 'The Listing is no longer accepting PFOs';
    }
    
    
    echo '
    </form>';
}

?>
