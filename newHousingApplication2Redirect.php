<?php
session_start();
    
    include_once 'config.inc.php';
        //Connecting to the sql database
    $con= get_dbconn();

    //Query that is retrieving the data from the application of the user
    $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='" . $_SESSION[userID] . "'");

    //Casting the query data onto a variable
    $row = mysql_fetch_array($result);

    
    
    
    //Check to see if the employer name has data in it
    if($_POST[employerName1] != '')
    {
        //writing the employer data into the application
        mysql_query("UPDATE APPLICATION SET CurrentEmployerName='$_POST[employerName1]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET CurrentSupFName='$_POST[superVisorFName1]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET CurentSupLName='$_POST[superVisorLName1]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET CurrentSupPhone='$_POST[superVisorPhone1]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET CurrentPositionName='$_POST[position1]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET CurrentMonthsEmployed='$_POST[monthsEmployed1]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET CurrentAnnualSalary='$_POST[annualSalary1]'
        WHERE UserID = '$_SESSION[userID]'");
    }
    
    //Seconday Employer
    if($_POST[employerName2] != '')
    {
        mysql_query("UPDATE APPLICATION SET PrevEmployerName='$_POST[employerName2]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET PrevSupFName='$_POST[superVisorFName2]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET PrevSupLName='$_POST[superVisorLName2]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET PrevSupPhone='$_POST[superVisorPhone2]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET PrevPositionName='$_POST[position2]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET PrevMonthsEmployed='$_POST[monthsEmployed2]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET PrevAnnualSalary='$_POST[annualSalary2]'
        WHERE UserID = '$_SESSION[userID]'");
    }
    
    //Co Applicant Employers
    if($_POST[coAppEmployerName1] != '')
    {
        mysql_query("UPDATE APPLICATION SET CoAppEmployerName='$_POST[coAppEmployerName1]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET CoAppSupFName='$_POST[coAppSuperVisorFName1]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET CoAppSupLName='$_POST[coAppSuperVisorLName1]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET CoAppSupPhone='$_POST[coAppSuperVisorPhone1]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET CoAppPositionName='$_POST[coAppPosition1]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET CoAppMonthsEmployed='$_POST[coAppMonthsEmployed1]'
        WHERE UserID = '$_SESSION[userID]'");

        mysql_query("UPDATE APPLICATION SET CoAppAnnualSalary='$_POST[coAppAnnualSalary1]'
        WHERE UserID = '$_SESSION[userID]'");
    }
    //co applicant 2
    
    /*
    mysql_query("UPDATE APPLICATION SET CoAppEmployerName='$_POST[coAppEmployerName1]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CoAppSupFName='$_POST[coAppSuperVisorFName1]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CoAppSupLName='$_POST[coAppSuperVisorLName1]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CoAppSupPhone='$_POST[coAppSuperVisorPhone1]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CoAppPositionName='$_POST[coAppPosition1]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CoAppMonthsEmployed='$_POST[coAppMonthsEmployed1]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CoAppAnnualSalary='$_POST[coAppAnnualSalary1]'
    WHERE UserID = '$_SESSION[userID]'");
     */
    
    
    //Setting which page has been compleated.  If the form has already been compleated it ignors this
    if($row[PageCompleted] != "6")
    {
        
        mysql_query("UPDATE APPLICATION SET PageCompleted='2'
        WHERE UserID = '$_SESSION[userID]'");
    }
    
    mysql_close();
    
    header( 'Location: /newHousingApplication3.php' );
?>
