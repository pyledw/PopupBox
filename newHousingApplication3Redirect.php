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
            WHERE UserID ='$_SESSION[userID]'");
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        //fetching the array of query elements
        while($row = mysql_fetch_array($result))
        {
            $appID = $row['ApplicationID'];
        }

   
       
            
    $sql="INSERT INTO PREVIOUSRESIDENCE (ApplicationID,PrevStreetAddress,PrevCity,PrevState,PrevZip,PrevLandLordFName,PrevLandLordLName,PrevPhone,ReasonForLeaving,TypeOfResidence,PrevMonthlyRent,TotalMonths)
    VALUES
    ('$appID','$_POST[address1]','$_POST[city1]','$_POST[state1]','$_POST[zipCode1]','$_POST[landlordsFName1]','$_POST[landlordsLName1]','$_POST[phoneNumber1]','$_POST[reasonForLeaving1]','$_POST[type1]','$_POST[rent1]','$_POST[months1]')";

    if (!mysql_query($sql,$con))
    {
        die('Error: ' . mysql_error());
    }


    mysql_query("UPDATE APPLICATION SET HasCrimHist='$_POST[felony]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET HasEvictHist='$_POST[evicted]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET HasBankruptHist='$_POST[bankruptcy]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET BankruptHistDesc='$_POST[ifYes]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET TotalConsumerDebt='$_POST[devitCardDebt]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET MonthlyDebtPayment='$_POST[monthlyPayments]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET TotalLoanDebt='$_POST[loans]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET TotalAssets='$_POST[equity]'
    WHERE UserID = '$_SESSION[userID]'");

    mysql_close();
    
    header( 'Location: /newHousingApplication4.php' );
?>
