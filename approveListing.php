
<?php

echo "redirect";

require "config.inc.php";
        //SQL connection information

        
        //Connecting to the sql database
        $con = mysql_connect($db_server,$db_user,$db_pass );
        if(!$con)
        {
            die('could not connect: ' .mysql_error());
        }
        else
        {
        //echo "connected to mySQL";
        }
        
        //Selecting the Database
        $select = mysql_selectdb($db_database, $con);
        if(!$select)
        {
            die('could not connect: ' .mysql_error());
        }
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
