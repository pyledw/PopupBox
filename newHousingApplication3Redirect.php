<?php
    session_start();
    
    //Creating a conneciton to the database and returning the valuse needed
    include_once 'config.inc.php';
        //Connecting to the sql database
    $connectionInfo= get_dbconn();
    $con = $connectionInfo[0];
    $select = $connectionInfo[1];
    
    //Query to retrieve the application of the user
    $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='$_SESSION[userID]'");
    
    //Casting the query results on to $row
    $row = mysql_fetch_array($result);
    
    //setting the current page compleated
    if($row[PageCompleate != "6"])
    {
        mysql_query("UPDATE APPLICATION SET PageCompleted='4'
            WHERE UserID = '$_SESSION[userID]'");
    }
    
    //Query to retrieve the application of the user
    $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='$_SESSION[userID]'");
        
        //fetching the array of query elements
        while($row = mysql_fetch_array($result))
        {
            $appID = $row['ApplicationID'];
        }
    
    
     
     //IF the address has data in it
     if($_POST[address1] != "")
        {
            //If the address did not exist before fields are created
            if($_POST[number1] == '')
            {
               $sql="INSERT INTO PREVIOUSRESIDENCE (ApplicationID,PrevStreetAddress,PrevCity,PrevState,PrevZip,PrevLandLordFName,PrevLandLordLName,PrevPhone,ReasonForLeaving,TypeOfResidence,PrevMonthlyRent,TotalMonths)
               VALUES
               ('$appID','$_POST[address1]','$_POST[city1]','$_POST[state1]','$_POST[zipCode1]','$_POST[landlordsFName1]','$_POST[landlordsLName1]','$_POST[phoneNumber1]','$_POST[reasonForLeaving1]','$_POST[type1]','$_POST[rent1]','$_POST[months1]')";

               if (!mysql_query($sql,$con))
               {
                   die('Error: ' . mysql_error());
               }
            }
            
            //If the address already existed - Fields are updated
            else
            {
                //echo $_POST[number1];
                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevStreetAddress='$_POST[address1]'
                                       WHERE PrevResidenceID = '$_POST[number1]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevCity='$_POST[city1]'
                                       WHERE PrevResidenceID = '$_POST[number1]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevState='$_POST[state1]'
                                       WHERE PrevResidenceID = '$_POST[number1]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevZip='$_POST[zipCode1]'
                                       WHERE PrevResidenceID = '$_POST[number1]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevLandLordFName='$_POST[landlordsFName1]'
                                       WHERE PrevResidenceID = '$_POST[number1]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevLandLordLName='$_POST[landlordsLName1]'
                                       WHERE PrevResidenceID = '$_POST[number1]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevPhone='$_POST[phoneNumber1]'
                                       WHERE PrevResidenceID = '$_POST[number1]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET ReasonForLeaving='$_POST[reasonForLeaving1]'
                                       WHERE PrevResidenceID = '$_POST[number1]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET TypeOfResidence='$_POST[type1]'
                                       WHERE PrevResidenceID = '$_POST[number1]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevMonthlyRent='$_POST[rent1]'
                                       WHERE PrevResidenceID = '$_POST[number1]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET TotalMonths='$_POST[months1]'
                                       WHERE PrevResidenceID = '$_POST[number1]'");
            }
     
     }
     
     //IF the address has data in it
     if($_POST[address2] != "")
        {
            //If the address did not exist before fields are created
            if($_POST[number2] == '')
            {
               $sql="INSERT INTO PREVIOUSRESIDENCE (ApplicationID,PrevStreetAddress,PrevCity,PrevState,PrevZip,PrevLandLordFName,PrevLandLordLName,PrevPhone,ReasonForLeaving,TypeOfResidence,PrevMonthlyRent,TotalMonths)
               VALUES
               ('$appID','$_POST[address2]','$_POST[city2]','$_POST[state2]','$_POST[zipCode2]','$_POST[landlordsFName2]','$_POST[landlordsLName2]','$_POST[phoneNumber2]','$_POST[reasonForLeaving2]','$_POST[type2]','$_POST[rent2]','$_POST[months2]')";

               if (!mysql_query($sql,$con))
               {
                   die('Error: ' . mysql_error());
               }
            }
            //If the address already existed - Fields are updated
            else
            {
                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevStreetAddress='$_POST[address2]'
                                       WHERE PrevResidenceID = '$_POST[number2]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevCity='$_POST[city2]'
                                       WHERE PrevResidenceID = '$_POST[number2]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevState='$_POST[state2]'
                                       WHERE PrevResidenceID = '$_POST[number2]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevZip='$_POST[zipCode2]'
                                       WHERE PrevResidenceID = '$_POST[number2]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevLandLordFName='$_POST[landlordsFName2]'
                                       WHERE PrevResidenceID = '$_POST[number2]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevLandLordLName='$_POST[landlordsLName2]'
                                       WHERE PrevResidenceID = '$_POST[number2]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevPhone='$_POST[phoneNumber2]'
                                       WHERE PrevResidenceID = '$_POST[number2]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET ReasonForLeaving='$_POST[reasonForLeaving2]'
                                       WHERE PrevResidenceID = '$_POST[number2]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET TypeOfResidence='$_POST[type2]'
                                       WHERE PrevResidenceID = '$_POST[number2]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevMonthlyRent='$_POST[rent2]'
                                       WHERE PrevResidenceID = '$_POST[number2]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET TotalMonths='$_POST[months2]'
                                       WHERE PrevResidenceID = '$_POST[number2]'");
            }
     
     }
     
     //IF the address has data in it
     if($_POST[address3] != "")
        {
            //If the address did not exist before fields are created
            if($_POST[number3] == '')
            {
               $sql="INSERT INTO PREVIOUSRESIDENCE (ApplicationID,PrevStreetAddress,PrevCity,PrevState,PrevZip,PrevLandLordFName,PrevLandLordLName,PrevPhone,ReasonForLeaving,TypeOfResidence,PrevMonthlyRent,TotalMonths)
               VALUES
               ('$appID','$_POST[address3]','$_POST[city3]','$_POST[state3]','$_POST[zipCode3]','$_POST[landlordsFName3]','$_POST[landlordsLName3]','$_POST[phoneNumber3]','$_POST[reasonForLeaving3]','$_POST[type3]','$_POST[rent3]','$_POST[months3]')";

               if (!mysql_query($sql,$con))
               {
                   die('Error: ' . mysql_error());
               }
            }
            //If the address already existed - Fields are updated
            else
            {
                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevStreetAddress='$_POST[address3]'
                                       WHERE PrevResidenceID = '$_POST[number3]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevCity='$_POST[city3]'
                                       WHERE PrevResidenceID = '$_POST[number3]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevState='$_POST[state3]'
                                       WHERE PrevResidenceID = '$_POST[number3]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevZip='$_POST[zipCode3]'
                                       WHERE PrevResidenceID = '$_POST[number3]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevLandLordFName='$_POST[landlordsFName3]'
                                       WHERE PrevResidenceID = '$_POST[number3]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevLandLordLName='$_POST[landlordsLName3]'
                                       WHERE PrevResidenceID = '$_POST[number3]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevPhone='$_POST[phoneNumber3]'
                                       WHERE PrevResidenceID = '$_POST[number3]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET ReasonForLeaving='$_POST[reasonForLeaving3]'
                                       WHERE PrevResidenceID = '$_POST[number3]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET TypeOfResidence='$_POST[type3]'
                                       WHERE PrevResidenceID = '$_POST[number3]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevMonthlyRent='$_POST[rent3]'
                                       WHERE PrevResidenceID = '$_POST[number3]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET TotalMonths='$_POST[months3]'
                                       WHERE PrevResidenceID = '$_POST[number3]'");
            }
     
     }
     
     //IF the address has data in it
     if($_POST[address4] != "")
        {
            //If the address did not exist before fields are created
            if($_POST[number4] == '')
            {
               $sql="INSERT INTO PREVIOUSRESIDENCE (ApplicationID,PrevStreetAddress,PrevCity,PrevState,PrevZip,PrevLandLordFName,PrevLandLordLName,PrevPhone,ReasonForLeaving,TypeOfResidence,PrevMonthlyRent,TotalMonths)
               VALUES
               ('$appID','$_POST[address4]','$_POST[city4]','$_POST[state4]','$_POST[zipCode4]','$_POST[landlordsFName4]','$_POST[landlordsLName4]','$_POST[phoneNumber4]','$_POST[reasonForLeaving4]','$_POST[type4]','$_POST[rent4]','$_POST[months4]')";

               if (!mysql_query($sql,$con))
               {
                   die('Error: ' . mysql_error());
               }
            }
            //If the address already existed - Fields are updated
            else
            {
                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevStreetAddress='$_POST[address4]'
                                       WHERE PrevResidenceID = '$_POST[number4]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevCity='$_POST[city4]'
                                       WHERE PrevResidenceID = '$_POST[number4]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevState='$_POST[state4]'
                                       WHERE PrevResidenceID = '$_POST[number4]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevZip='$_POST[zipCode4]'
                                       WHERE PrevResidenceID = '$_POST[number4]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevLandLordFName='$_POST[landlordsFName4]'
                                       WHERE PrevResidenceID = '$_POST[number4]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevLandLordLName='$_POST[landlordsLName4]'
                                       WHERE PrevResidenceID = '$_POST[number4]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevPhone='$_POST[phoneNumber4]'
                                       WHERE PrevResidenceID = '$_POST[number4]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET ReasonForLeaving='$_POST[reasonForLeaving4]'
                                       WHERE PrevResidenceID = '$_POST[number4]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET TypeOfResidence='$_POST[type4]'
                                       WHERE PrevResidenceID = '$_POST[number4]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET PrevMonthlyRent='$_POST[rent4]'
                                       WHERE PrevResidenceID = '$_POST[number4]'");

                mysql_query("UPDATE PREVIOUSRESIDENCE SET TotalMonths='$_POST[months4]'
                                       WHERE PrevResidenceID = '$_POST[number4]'");
            }
     
     }
        
    


    //Setting other application elemnts
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
    
    //rerouting the user to the next application page
    header( 'Location: /newHousingApplication4.php' );
?>
