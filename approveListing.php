

<?php

/** 
 * This page is for if a administrator chooses to approve a listing.
 * The data is moved to the auction field so the listing will go live.
 * This creates the actual auction row in the AUCTION table
 * 
 * @author David Pyle <Pyledw@Gmail.com>
 */

echo "redirect";

require_once "config.inc.php";
        //SQL connection information


	$con = get_dbconn("");

        $result = mysql_query("SELECT * FROM PROPERTY
            WHERE PropertyID = '$_POST[propertyID]'");
        
        $row = mysql_fetch_array($result);
        $propertyID = $row[PropertyID];
        $dateAvailable = $row[DateAvailable];
        $datePFOAccept = $row[DatePFOAccept];
        $datePFOEndAccept = $row[DatePFOEndAccept];
        $dateTimeOpenHouse1 = $row[DateTimeOpenHouse1];
        $dateTimeOpenHouse2 = $row[DateTimeOpenHouse2];
        $startingBid = $row[StartingBid];
        $minBidIncrement = $row[MinBidIncrement];
        $requiredDeposit = $row[RequiredDeposit];
        $rentNowRate = $row[RentNowRate];
        $minimumTerm = $row[MinimumTerm];
        $preMarket = $row[PreMarket];
        
        
        mysql_query("INSERT INTO AUCTION (PropertyID,DateAvailable,DatePFOAccept,DatePFOEndAccept,DateTimeOpenHouse1,DateTimeOpenHouse2,StartingBid,MinBidIncrement,RequiredDeposit,RentNowRate,MinimumTerm,PreMarket)
        VALUES
        ('$propertyID','$dateAvailable','$datePFOAccept','$datePFOEndAccept','$dateTimeOpenHouse1','$dateTimeOpenHouse2','$startingBid','$minBidIncrement','$requiredDeposit','$rentNowRate','$minimumTerm','$preMarket')");
        
        mysql_query("UPDATE PROPERTY SET IsApproved='1'
        WHERE PropertyID = '$_POST[propertyID]'");
        
        header( 'Location: /myHood.php' );
        
?>
