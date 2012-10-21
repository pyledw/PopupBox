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

    mysql_query("UPDATE APPLICATION SET CurrentEmployerName='$_POST[employerName]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CurrentSupFName='$_POST[superVisorFName]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CurentSupLName='$_POST[superVisorLName]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CurrentSupPhone='$_POST[superVisorPhone]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CurrentPositionName='$_POST[position]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CurrentMonthsEmployed='$_POST[monthsEmployed]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CurrentAnnualSalary='$_POST[annualSalary]'
    WHERE UserID = '$_SESSION[userID]'");
    
    //Seconday Employer
    
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
    
    //Co Applicant Employers
    
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
    
    
    mysql_close();
    
    header( 'Location: /newHousingApplication3.php' );
?>
