<?php
//echo $_GET[propertyID];
    session_start();
    include_once 'config.inc.php';
    $con = get_dbconn("");
    
    //Query to select the user's application using their userID number
    $result = mysql_query("SELECT * FROM USER
        INNER JOIN APPLICATION
        ON USER.UserID=APPLICATION.UserID
        INNER JOIN BID
        ON APPLICATION.ApplicationID=BID.ApplicationID
        INNER JOIN AUCTION
        ON BID.AuctionID=AUCTION.AuctionID
        INNER JOIN PROPERTY
        ON AUCTION.PropertyID=PROPERTY.PropertyID
        WHERE PROPERTY.PropertyID='$_GET[propertyID]'
        ");
    
    
    if(!$result)
    {
        die('could not connect: ' .mysql_error());
    }
    
    ?>

    <table class="tableForm" style="margin-top: -10px;">
        <tr>
            <th colspan="6" style="padding-bottom: 10px; vertical-align: middle;">
                PFOs on Property #<?php echo $_GET[propertyID]; ?>
            </th>
        </tr>
    <?php

    While($row = mysql_fetch_array($result))
    {
        
        echo "<tr>
                <td>
                    ".$row[UserName]."
                </td>
                <td>
                    ".$row[MonthlyRate]."
                </td>
                <td colspan='2'>
                    <a class='button' href='viewApplicationPage.php?applicationID=".$row[ApplicationID]."' >View Application</a><br/><br/>
                </td>
             </tr>
                ";
    }
    
    
    
?>
    </table>
