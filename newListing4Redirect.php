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
