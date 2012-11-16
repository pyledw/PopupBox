<?php
    /**
     * This page will be in the form of a popup showing a list of all the submitted PFOs.
     * It allows the user to select an applicaiton and view it on a new page.
     * 
     * It will retrieve this info ising the property ID that will eb gotten in the form of a GET request.
     * It will then display the data for the user
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    
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
        ORDER BY BID.MonthlyRate DESC
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
                   <form method='POST' action='viewApplicationPage.php'>
                        <input name='applicationID' style='display:none;' value='".$row[ApplicationID]."'>
                        <input name='auctionID' style='display:none;' value='".$row[AuctionID]."'>
                        <button class='button' type='submit'>View Application</button>
                    </form>
                </td>
             </tr>
                ";
    }
    
    
    
?>
    </table>
