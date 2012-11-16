<?php
    /**
     * This page is the popup for a landlord to confirm that he is accepting this application
     * as the winning bid.  It will then reroute sending the BidID of the winning bid and the user to the redirect page to ensure the
     * bid status is changed.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
?>

<table class="tableForm" style="margin-top: -5px">
    <tr>
        <td>
            Are you sure you want to accept this users bid?
        </td>
    </tr>
    <tr>
        <td>
            <?php
            echo "<form method='POST' action='confirmPFOSelectionRedirect.php'>
                        <input name='applicationID' style='display:none;' value='".$_GET[applicationID]."'>
                        <input name='auctionID' style='display:none;' value='".$_GET[auctionID]."'>
                        <button class='button' type='submit'>Yes</button>
                    </form>";
            ?>
        </td>
    </tr>
</table>


<?php
    
?>
