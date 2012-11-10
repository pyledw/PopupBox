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
                        <input name='applicationID' style='display:none;' value='".$_POST[applicationID]."'>
                        <input name='auctionID' style='display:none;' value='".$_POST[auctionID]."'>
                        <button class='button' type='submit'>Yes</button>
                    </form>";
            ?>
        </td>
    </tr>
</table>


<?php
    
?>
