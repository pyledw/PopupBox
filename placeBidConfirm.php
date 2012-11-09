<!-- This window will preform validation as well as an confirmation box. -->

<?php
session_start();
$propertyID = $_GET["propertyID"];
$auctionID = $_GET["auctionID"];
$bidAmount = $_GET["amt"];
$userID = $_SESSION[userID];

include_once 'config.inc.php';

$con = get_dbconn("");

    
$result = mysql_query("SELECT * FROM BID
           INNER JOIN APPLICATION
           ON BID.ApplicationID=APPLICATION.ApplicationID
           INNER JOIN USER
           ON APPLICATION.UserID=USER.UserID
           WHERE AuctionID='$auctionID'");

 if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }

$accept = TRUE;
$active = TRUE;
$more = TRUE;
$highestAmount = 0;

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
           if(!$more)
           {
               $highestAmount = $row[MonthlyRate];
           }
    }
}
?>
<form id="placebid" method="post" action="placeBid.php">

<table style="margin-top: -5px;" class="tableForm">
    <tr>
        <td>
            My Proposal for occupancy
        </td>
    </tr>
<?php

if($accept && $active)
{
    if(!$more)
        {
            echo '<tr>
                    <td>
                        You may continue, The highest bid is:
                        $'.$highestAmount .' 
                    </td>
                  </tr>
                  <tr>
                    <td>
                        Consider increasing your bid.
';
        }
    echo'
    <tr>
        <td>
            Your Bid: '.$_GET["amt"].'
        </td>
    </tr>
    <tr>
        <td>
            Are you sure you want to submit your bid?
        </td>
    </tr> 
    <tr>
        <td>
            <input type="text" style="display: none;" name="amt" value="'.$bidAmount.'" />
            <input type="text" style="display: none;" name="auctionID" value="'.$aucitonID.'" />
            <input type="text" style="display: none;" name="userID" value="'.$userID.'" />
            <input type="text" style="display: none;" name="propertyID" value="'.$propertyID.'" />
        </td>
    </tr> 
    <tr>
        <td>
            <button class="button" type="submit">Submit</button>
        </td>
    </tr>';
}
else
{
    echo '
        <tr>
            <td>
                There is an error with your bid.
            </td>
        </tr> 
    ';
    if(!$accept)
        {

            echo '
                <tr>
                    <td>
                        Your Previus Bid was higher than your current offer
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label class="label">Your Bid: '.$_GET["amt"].'</label><br/>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label class="label">Your Highest Bid: '.$lastBid.'</label>
                    </td>
                </tr>
            ';
        }
        if(!$active)
        {
            echo 'The Listing is no longer accepting PFOs';
        }
}
?>
    </form>
</table>
