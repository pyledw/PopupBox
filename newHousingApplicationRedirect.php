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
    
    
     
    $sql="INSERT INTO APPLICATION (NumOtherOccupants,SecondaryOccupantFName,UserID, EarlyMoveIn, LateMoveIn, IsADA, IsSmokingRequired, SecondaryOccupantLName, SecondaryOccupantAge, SecondaryOccupantRelationship,Pet1Type,Pet1Breed,Pet1Age,Pet1Weight,Pet2Type,Pet2Breed,Pet2Age,Pet2Weight,Pet3Type,Pet3Breed,Pet3Age,Pet3Weight)
    VALUES
    ('$_POST[numbOccupants]','$_POST[fName]','$_SESSION[userID]','$_POST[earliestDate]','$_POST[latestDate]','$_POST[ADA]','$_POST[smoking]','$_POST[lName]','$_POST[age]','$_POST[relationship]','$_POST[animalType]','$_POST[animalBreed]','$_POST[animalAge]','$_POST[animalWeight]','$_POST[animalType2]','$_POST[animalBreed2]','$_POST[animalAge2]','$_POST[animalWeight2]','$_POST[animalType3]','$_POST[animalBreed3]','$_POST[animalAge3]','$_POST[animalWeight3]')";
    
    if (!mysql_query($sql,$con))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close();
    
    header( 'Location: /newHousingApplication2.php' );
?>
