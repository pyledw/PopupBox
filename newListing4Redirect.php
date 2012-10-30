<?php
session_start();
    
    require_once "config.inc.php";
         
    $con = get_dbconn("");
    $propertyID = $_SESSION[propertyID];
    
    mysql_query("UPDATE PROPERTY SET AllowCriminalHistory='$_POST[criminalHistory]'
            WHERE PropertyID = '$propertyID'");
    mysql_query("UPDATE PROPERTY SET MinimumSalary='$_POST[minSalary]'
            WHERE PropertyID = '$propertyID'");
    mysql_query("UPDATE PROPERTY SET AllowSmoking='$_POST[smoking]'
            WHERE PropertyID = '$propertyID'");
    mysql_query("UPDATE PROPERTY SET PreMarket='$_POST[moveInDate]'
            WHERE PropertyID = '$propertyID'");
    mysql_query("UPDATE PROPERTY SET DateAvailable='$_POST[numberOfOccupants]'
            WHERE PropertyID = '$propertyID'");
    mysql_query("UPDATE PROPERTY SET AllowCats='$_POST[cats]'
            WHERE PropertyID = '$propertyID'");
    mysql_query("UPDATE PROPERTY SET AllowDogs='$_POST[dogs]'
            WHERE PropertyID = '$propertyID'");
    mysql_query("UPDATE PROPERTY SET AllowPetDepositRefund='$_POST[petDepositrefundable]'
            WHERE PropertyID = '$propertyID'");
    
    mysql_query("UPDATE PROPERTY SET PetDepost=''
            WHERE PropertyID = '$propertyID'");
    
    
    

    mysql_close();
    
    header( 'Location: /newListing5.php' );
?>
