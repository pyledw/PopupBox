
<?php

    /**
     * This popup box is a confirmation box that ensures the users bid is valid and so that the
     * user has a chance to confirm his bid.  The window will check to ensure that the 
     * user does not have an active bid on another listing, it will also check to ensure that
     * the bid is more than their last bid.
     * 
     * On user confirmation it will send teh data to a redirect page to send the data to the database.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
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
<?php

if($accept && $active)
{
    if(!$more)
        {
            echo '<tr>
                    <td>
                        Ther is another PFO higher than your proposed PFO, The highest bid is:
                        $'.$highestAmount .' 
                    </td>
                  </tr>
                  <tr>
                    <td>
                        Consider increasing your PFO in order to increase your chances.
';
        }
    echo'
    <tr>
        <td>
            Your PFO is: '.$_GET["amt"].'
        </td>
    </tr>
    <tr>
        <td>
            Are you sure you want to submit your PFO?
        </td>
    </tr> 
    <tr>
        <td>
            <input type="text" style="display: none;" name="amt" value="'.$bidAmount.'" />
            <input type="text" style="display: none;" name="auctionID" value="'.$auctionID.'" />
            <input type="text" style="display: none;" name="userID" value="'.$userID.'" />
            <input type="text" style="display: none;" name="propertyID" value="'.$propertyID.'" />
        </td>
    </tr> 
    <tr>
        <td>
            <button class="button" type="submit">Submit PFO</button>
        </td>
    </tr>';
}
else
{
    echo '
        <tr>
            <td>
                There is an error with your PFO.
            </td>
        </tr> 
    ';
    if(!$accept)
        {

            echo '
                <tr>
                    <td>
                        Your Previus PFO was higher than your current offer
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label class="label">Your PFO: '.$_GET["amt"].'</label><br/>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label class="label">Your Highest PFO: '.$lastBid.'</label>
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
