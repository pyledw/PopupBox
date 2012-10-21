<?php
    $title = "Housing Application Part 5";
    include 'Header.php';
    
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
    
    //Updating teh Emergency contacts
    
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
    
    
    
    
    
?>
<br/>
<br/>
<br/>
<form class="formStyle" width="90%" height="90%" method="post" action="newHousingApplication6.php">
    Your application is now complete.  It will be submitted for verification  
    once you certify and click "Continue" below and after your $6 application 
    fee has been processed.  Please thoroughly review the terms and conditions
    below and continue with your application.  After submission, you will 
    notified within approximately two (2) business days as to the status of 
    your application with LeaseHood.com, confirming your status to submit a 
    Proposal for Occupancy.  Until such time you will have provisional 
    capabilities.  Your application will be valid for 90 days after verified,
    allowing you to submit multiple PFOs at separate times (you will not be able
    to submit multiple PFOs simultaneously) without additional application fees.
    <br/>
    TERMS AND CONDITIONS
    <br/>
    Please enter your email<input type="text" name="email"/>
    <br/>
    <br/>
    <button type="submit" class="button">Save and Continue</button>
    <button type="reset" class="button">Clear</button>
    
    
</form>
<?php
    include 'Footer.php';
?>
