<?php
session_start();
    
    require_once "config.inc.php";
    $con = get_dbconn();

    $propertyID = $_SESSION[propertyID];
    
    mysql_query("UPDATE PROPERTY SET DateAvailable='$_POST[available]'
            WHERE PropertyID = '$propertyID'");
    
    mysql_query("UPDATE PROPERTY SET DatePFOAccept='$_POST[acceptingPFO]'
            WHERE PropertyID = '$propertyID'");
    
    mysql_query("UPDATE PROPERTY SET DatePFOEndAccept='$_POST[stopAcceptingPFO]'
            WHERE PropertyID = '$propertyID'");
    
    mysql_query("UPDATE PROPERTY SET DateTimeOpenHouse1='$_POST[openHouse1]'
            WHERE PropertyID = '$propertyID'");
    
    mysql_query("UPDATE PROPERTY SET DateTimeOpenHouse2='$_POST[openHouse2]'
            WHERE PropertyID = '$propertyID'");
    
    mysql_query("UPDATE PROPERTY SET StartingBid='$_POST[startingBid]'
            WHERE PropertyID = '$propertyID'");
    
    mysql_query("UPDATE PROPERTY SET MinBidIncrement='$_POST[bidIncrement]'
            WHERE PropertyID = '$propertyID'");
    
    mysql_query("UPDATE PROPERTY SET RequiredDeposit='$_POST[requiredDeposit]'
            WHERE PropertyID = '$propertyID'");
    
    mysql_query("UPDATE PROPERTY SET RentNowRate='$_POST[rentItNowRate]'
            WHERE PropertyID = '$propertyID'");
    
    mysql_query("UPDATE PROPERTY SET MinimumTerm='$_POST[minTerm]'
            WHERE PropertyID = '$propertyID'");
    
    mysql_query("UPDATE PROPERTY SET PreMarket='$_POST[comingSoon]'
            WHERE PropertyID = '$propertyID'");
    

    mysql_close();
    
    header( 'Location: /newListing4.php' );
?>
