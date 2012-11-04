<?php
session_start();
$BidID = $_GET[bidID];

//echo $BidID;
include_once 'config.inc.php';
$con = get_dbconn("");

$result = mysql_query("SELECT * FROM BID
            INNER JOIN AUCTION
            ON BID.AuctionID=AUCTION.AuctionID
            INNER JOIN PROPERTY
            ON AUCTION.PropertyID=PROPERTY.PropertyID
            WHERE BidID='$BidID'
            ");

if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }

$row = mysql_fetch_array($result);

?>
<div>
    <form id="updatePFO" method="post" action="changeMyPFORedirect.php">
        <table class="tableForm" style="margin-top: 0;">
            <tr>
                <th colspan="3">
                    <h1>Change You PFO <?php echo $BidID ?></h1> 
                </th>
            </tr>
            <tr>
                <td>
                    Current Bid: $<?php echo $row[MonthlyRate] ?>
                </td>
                <td>
                    Address of Property: <?php echo $row[Address] ?>
                </td>
            </tr>
            <tr>
                <td>
                    New Bid: <input type="text" name="bid" class="required" />
                    <input type="text" name="bidID" value="<?php echo $BidID ?>" style="display: none" />
                </td>
                <td>
                    <button type="submint" class="button">Submit New Bid</button>
                </td>
            </tr>
            
        </table>
        
    </form>
</div>

<script>
    $(document).ready(function(){
    $("#updatePFO").validate({
        ignoreTitle: true
        
    });
  });

   $(function(){
         $.fn.formLabels();
   });
</script>