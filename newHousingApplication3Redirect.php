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
    $row = mysql_fetch_array($result);
    if($row[PageCompleate != "6"])
    {
        mysql_query("UPDATE APPLICATION SET PageCompleted='4'
            WHERE UserID = '$_SESSION[userID]'");
    }
    
    $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='$_SESSION[userID]'");
        
        //fetching the array of query elements
        while($row = mysql_fetch_array($result))
        {
            $appID = $row['ApplicationID'];
        }
    
    
    
   
       
     if($_POST[address1] != "")
     {
            $sql="INSERT INTO PREVIOUSRESIDENCE (ApplicationID,PrevStreetAddress,PrevCity,PrevState,PrevZip,PrevLandLordFName,PrevLandLordLName,PrevPhone,ReasonForLeaving,TypeOfResidence,PrevMonthlyRent,TotalMonths)
            VALUES
            ('$appID','$_POST[address1]','$_POST[city1]','$_POST[state1]','$_POST[zipCode1]','$_POST[landlordsFName1]','$_POST[landlordsLName1]','$_POST[phoneNumber1]','$_POST[reasonForLeaving1]','$_POST[type1]','$_POST[rent1]','$_POST[months1]')";

            if (!mysql_query($sql,$con))
            {
                die('Error: ' . mysql_error());
            }
     }
    
    if($_POST[address2] != "")
     {
            $sql="INSERT INTO PREVIOUSRESIDENCE (ApplicationID,PrevStreetAddress,PrevCity,PrevState,PrevZip,PrevLandLordFName,PrevLandLordLName,PrevPhone,ReasonForLeaving,TypeOfResidence,PrevMonthlyRent,TotalMonths)
            VALUES
            ('$appID','$_POST[address2]','$_POST[city2]','$_POST[state2]','$_POST[zipCode2]','$_POST[landlordsFName2]','$_POST[landlordsLName2]','$_POST[phoneNumber2]','$_POST[reasonForLeaving2]','$_POST[type2]','$_POST[rent2]','$_POST[months2]')";

            if (!mysql_query($sql,$con))
            {
                die('Error: ' . mysql_error());
            }
     }
     
     if($_POST[address3] != "")
     {
            $sql="INSERT INTO PREVIOUSRESIDENCE (ApplicationID,PrevStreetAddress,PrevCity,PrevState,PrevZip,PrevLandLordFName,PrevLandLordLName,PrevPhone,ReasonForLeaving,TypeOfResidence,PrevMonthlyRent,TotalMonths)
            VALUES
            ('$appID','$_POST[address3]','$_POST[city3]','$_POST[state3]','$_POST[zipCode3]','$_POST[landlordsFName3]','$_POST[landlordsLName3]','$_POST[phoneNumber3]','$_POST[reasonForLeaving3]','$_POST[type3]','$_POST[rent3]','$_POST[months3]')";

            if (!mysql_query($sql,$con))
            {
                die('Error: ' . mysql_error());
            }
     }
    
     if($_POST[address4] != "")
     {
            $sql="INSERT INTO PREVIOUSRESIDENCE (ApplicationID,PrevStreetAddress,PrevCity,PrevState,PrevZip,PrevLandLordFName,PrevLandLordLName,PrevPhone,ReasonForLeaving,TypeOfResidence,PrevMonthlyRent,TotalMonths)
            VALUES
            ('$appID','$_POST[address4]','$_POST[city4]','$_POST[state1]4]','$_POST[zipCode4]','$_POST[landlordsFName4]','$_POST[landlordsLName4]','$_POST[phoneNumber4]','$_POST[reasonForLeaving4]','$_POST[type4]','$_POST[rent4]','$_POST[months4]')";

            if (!mysql_query($sql,$con))
            {
                die('Error: ' . mysql_error());
            }
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
