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
    
    //Updating the Emergency contacts
    
    mysql_query("UPDATE APPLICATION SET ContactFName='$_POST[Fname]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET ContactLName='$_POST[Lname]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET ContactAddress='$_POST[address]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET ContactState='$_POST[state]'
    WHERE UserID = '$_SESSION[userID]'");
    
    //Field that does not exist in the database
    //
    //mysql_query("UPDATE APPLICATION SET ContactCity='$_POST[City]'
    //WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET ContactZip='$_POST[zip]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET ContactRelation='$_POST[relation]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET ContactHomePhone='$_POST[homePhone]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET ContactWorkPhone='$_POST[cellPhone]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET ContactCellPhone='$_POST[workPhone]'
    WHERE UserID = '$_SESSION[userID]'");
    
    
    //Car fields
    
    mysql_query("UPDATE APPLICATION SET Vehicle1Desc='$_POST[carMake]'
    WHERE UserID = '$_SESSION[userID]'");
    
    /* Fields that are not in the database
     * 
    mysql_query("UPDATE APPLICATION SET Vehicle1Color='$_POST[carColor]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET Vehicle1Year='$_POST[carYear]'
    WHERE UserID = '$_SESSION[userID]'");
     * 
     */
    
    mysql_query("UPDATE APPLICATION SET Vehicle1LicenseNo='$_POST[carLicenseNumber]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET Vehicle1LicenseState='$_POST[carPlateState]'
    WHERE UserID = '$_SESSION[userID]'");
    
    //car 2
    
    mysql_query("UPDATE APPLICATION SET Vehicle2Desc='$_POST[carMake2]'
    WHERE UserID = '$_SESSION[userID]'");
    
    /* Fields that are not in the database
     * 
    mysql_query("UPDATE APPLICATION SET Vehicle2Color='$_POST[carColor2]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET Vehicle2Year='$_POST[carYear2]'
    WHERE UserID = '$_SESSION[userID]'");
     * 
     */
    
    mysql_query("UPDATE APPLICATION SET Vehicle2LicenseNo='$_POST[carLicenseNumber2]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET Vehicle2LicenseState='$_POST[carPlateState2]'
    WHERE UserID = '$_SESSION[userID]'");
    
    //car 3
    
    mysql_query("UPDATE APPLICATION SET Vehicle3Desc='$_POST[carMake3]'
    WHERE UserID = '$_SESSION[userID]'");
    
    /* Fields that are not in the database
     * 
    mysql_query("UPDATE APPLICATION SET Vehicle3Color='$_POST[carColor3]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET Vehicle3Year='$_POST[carYear3]'
    WHERE UserID = '$_SESSION[userID]'");
     * 
     */
    
    mysql_query("UPDATE APPLICATION SET Vehicle3LicenseNo='$_POST[carLicenseNumber3]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET Vehicle3LicenseState='$_POST[carPlateState3]'
    WHERE UserID = '$_SESSION[userID]'");
    
    //car 4
    
    mysql_query("UPDATE APPLICATION SET Vehicle4Desc='$_POST[carMake4]'
    WHERE UserID = '$_SESSION[userID]'");
    
    /* Fields that are not in the database
     * 
    mysql_query("UPDATE APPLICATION SET Vehicle4Color='$_POST[carColor4]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET Vehicle4Year='$_POST[carYear4]'
    WHERE UserID = '$_SESSION[userID]'");
     * 
     */
    
    mysql_query("UPDATE APPLICATION SET Vehicle4LicenseNo='$_POST[carLicenseNumber4]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET Vehicle4LicenseState='$_POST[carPlateState4]'
    WHERE UserID = '$_SESSION[userID]'");
    
    if($row[PageCompleated] != '6')
    {
        mysql_query("UPDATE APPLICATION SET PageCompleted='5'
            WHERE UserID = '$_SESSION[userID]'");
    }
    
    mysql_close();
    
    header( 'Location: /newHousingApplication5.php' );
?>