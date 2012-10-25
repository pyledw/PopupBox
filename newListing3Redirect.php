<?php
session_start();
    
    require "config.inc.php";
         
    $con = mysql_connect($db_server,$db_user,$db_pass );
    if(!$con)
    {
        die('could not connect: ' .mysql_error());
    }
    else
    {
        //echo "connected to mySQL";
    }
    $select = mysql_selectdb($db_database, $con);
    if(!$select)
    {
        die('could not connect: ' .mysql_error());
    }
    else
    {
        //echo "Selected Database";
    }
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
