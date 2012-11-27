<?php
$auctionID = $_GET['auctionID'];
echo $auctionID;


?>

<table>
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