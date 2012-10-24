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
    $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='" . $_SESSION[userID] . "'");

        
    $row = mysql_fetch_array($result);
    
    if(mysql_num_rows($result) == 0)
    {
        $sql="INSERT INTO APPLICATION (NumOtherOccupants,SecondaryOccupantFName,UserID, EarlyMoveIn, LateMoveIn, IsADA, IsSmokingRequired, SecondaryOccupantLName, SecondaryOccupantAge, SecondaryOccupantRelationship,Pet1Type,Pet1Breed,Pet1Age,Pet1Weight,Pet2Type,Pet2Breed,Pet2Age,Pet2Weight,Pet3Type,Pet3Breed,Pet3Age,Pet3Weight)
        VALUES
        ('$_POST[numbOccupants]','$_POST[fName]','$_SESSION[userID]','$_POST[earliestDate]','$_POST[latestDate]','$_POST[ADA]','$_POST[smoking]','$_POST[lName]','$_POST[age]','$_POST[relationship]','$_POST[animalType]','$_POST[animalBreed]','$_POST[animalAge]','$_POST[animalWeight]','$_POST[animalType2]','$_POST[animalBreed2]','$_POST[animalAge2]','$_POST[animalWeight2]','$_POST[animalType3]','$_POST[animalBreed3]','$_POST[animalAge3]','$_POST[animalWeight3]')";

        if (!mysql_query($sql,$con))
        {
            die('Error: ' . mysql_error());
        }
    } 
    else
    {
    
        mysql_query("UPDATE APPLICATION SET NumOtherOccupants='$_POST[numbOccupants]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET SecondaryOccupantFName='$_POST[fName]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET EarlyMoveIn='$_POST[earliestDate]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET LateMoveIn='$_POST[latestDate]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET IsADA='$_POST[ADA]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET IsSmokingRequired='$_POST[smoking]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET SecondaryOccupantLName='$_POST[lName]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET SecondaryOccupantAge='$_POST[age]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET SecondaryOccupantRelationship='$_POST[relationship]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET Pet1Type='$_POST[animalType]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET Pet1Breed='$_POST[animalBreed]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET Pet1Age='$_POST[animalAge]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET Pet1Weight='$_POST[animalWeight]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET Pet2Type='$_POST[animalType2]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET Pet2Breed='$_POST[animalBreed2]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET Pet2Age='$_POST[animalAge2]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET Pet2Weight='$_POST[animalWeight2]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET Pet3Type='$_POST[animalType3]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET Pet3Breed='$_POST[animalBreed3]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET Pet3Age='$_POST[animalAge3]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET Pet3Weight='$_POST[animalWeight3]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET Pet4Type='$_POST[animalType4]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET Pet4Breed='$_POST[animalBreed4]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET Pet4Age='$_POST[animalAge4]'
            WHERE UserID = '$_SESSION[userID]'");
        mysql_query("UPDATE APPLICATION SET Pet4Weight='$_POST[animalWeight4]'
            WHERE UserID = '$_SESSION[userID]'");
    }
    echo $row[PageCompleted];
    if($row[PageCompleated] != "6")
    {
        mysql_query("UPDATE APPLICATION SET PageCompleted='2'
            WHERE UserID = '$_SESSION[userID]'");
    }
    
     
    mysql_close();
    
    header( 'Location: /newHousingApplication2.php' );
?>
