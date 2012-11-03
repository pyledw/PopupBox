<?php
session_start();
    
    
    //Creating conneciton to the Database
    include_once 'config.inc.php';
        //Connecting to the sql database
    $con = get_dbconn("");

    
    if(!isset($_SESSION[propertyID]))
    {
        mysql_query("INSERT INTO PROPERTY (UserID,Address)
        VALUES
        ('$_SESSION[userID]','$_POST[address]')");
        
        $propertyID = mysql_insert_id();
        
        
        //Query getting the application data for this user
        $result = mysql_query("SELECT * FROM PROPERTY
            WHERE address ='$_POST[address]'");

        //setting the query data equal to a variable
        $row = mysql_fetch_array($result);
        
    }
    else
    {
        $propertyID = $_SESSION[propertyID];
        mysql_query("UPDATE PROPERTY SET Address='$_POST[address]'
            WHERE PropertyID = '$propertyID'");
    }
    
    
    //This sction below will get the latitude and Longitude of the address and store it in the database
        include_once 'locationLookup.php';
        $location = getLatandLongAddress($_POST[address], $_POST[city], $_POST[state]);
        $lat = $location[0];
        $lon = $location[1];
    
    
        mysql_query("UPDATE PROPERTY SET Lattitude='$lat'
            WHERE PropertyID = '$propertyID'");
        mysql_query("UPDATE PROPERTY SET Longitude='$lon'
            WHERE PropertyID = '$propertyID'");
    
    
       
        mysql_query("UPDATE PROPERTY SET Zip='$_POST[zipCode]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET County='$_POST[county]'
            WHERE PropertyID = '$propertyID'");
        
        
        mysql_query("UPDATE PROPERTY SET City='$_POST[city]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET State='$_POST[state]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET SF='$_POST[sqrFt]'
            WHERE PropertyID = '$propertyID'");
        
        
        mysql_query("UPDATE PROPERTY SET Beedroom='$_POST[bedRooms]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET Bath='$_POST[bathRooms]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET Garage='$_POST[garage]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET Heating='$_POST[heating]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET AC='$_POST[airConditioning]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET Media='$_POST[media]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET IceMaker='$_POST[ice]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET DishWasher='$_POST[dishWasher]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET Disposal='$_POST[disposal]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET ClothesWasher='$_POST[clothesWasher]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET ClothesDryer='$_POST[clothesDryer]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET Microwave='$_POST[microwave]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET SecurityAlarm='$_POST[security]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET Deck='$_POST[deck]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET Pool='$_POST[pool]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET Fenced='$_POST[fenced]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET Description='$_POST[description]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET ClothesWasherHookup='$_POST[washerHookup]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET ClothesDryerHookup='$_POST[dryerHookup]'
            WHERE PropertyID = '$propertyID'");
        
        mysql_query("UPDATE PROPERTY SET ADACompliant='$_POST[ADA]'
            WHERE PropertyID = '$propertyID'");
        
        $_SESSION['propertyID'] = $propertyID;
    
    
    mysql_close();
    
    header( 'Location: /newListing2.php' );
?>
