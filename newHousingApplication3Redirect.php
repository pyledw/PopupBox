<?php
    /** 
     * This redirect will get all of the inforamiton from the previus page in a form post.
     * It will check the database to see if an applicaiton is already on file.
     * It will then insert the new applicaiton info into the APPLICATION table or Update
     * the previus info acordingly.
     * 
     * It finaly checks to see if the user application was completed, and if it was not
     * it will update the pagecompleted field to the correct page.
     */
    
    session_start();
    
    
    
    //Creating a conneciton to the database and returning the valuse needed
    include_once 'config.inc.php';
        //Connecting to the sql database
    $con= get_dbconn("");

    //Query to retrieve the application of the user
    $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='$_SESSION[userID]'");
    
    //Casting the query results on to $row
    $row = mysql_fetch_array($result);
    
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
               //Using the new method for inserting into the Database
                $con = get_dbconn("PDO");
                $stmt = $con->prepare("INSERT INTO PREVIOUSRESIDENCE (
                    ApplicationID,              PrevStreetAddress,              PrevCity,
                    PrevState,                  PrevZip,                        PrevLandLordFName,
                    PrevLandLordLName,          PrevPhone,                      ReasonForLeaving,
                    TypeOfResidence,            PrevMonthlyRent,                TotalMonths
                    )
               VALUES (
                    :appID,                     :address1,                      :city1,
                    :state1,                    :zipCode1,                      :landlordsFName1,
                    :landlordsLName1,           :phoneNumber1,                  :reasonForLeaving1,
                    :type1,                     :rent1,                         :months1
                    
               )");
                try {
                    $stmt->bindValue(':appID',                  $appID,                          PDO::PARAM_STR);
                    $stmt->bindValue(':address1',               $_POST['address1'],              PDO::PARAM_STR);
                    $stmt->bindValue(':city1',                  $_POST['city1'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':state1',                 $_POST['state1'],                PDO::PARAM_STR);
                    $stmt->bindValue(':zipCode1',               $_POST['zipCode1'],              PDO::PARAM_STR);
                    $stmt->bindValue(':landlordsFName1',        $_POST['landlordsFName1'],       PDO::PARAM_STR);
                    $stmt->bindValue(':landlordsLName1',        $_POST['landlordsLName1'],       PDO::PARAM_STR);
                    $stmt->bindValue(':phoneNumber1',           $_POST['phoneNumber1'],          PDO::PARAM_STR);
                    $stmt->bindValue(':reasonForLeaving1',      $_POST['reasonForLeaving1'],     PDO::PARAM_STR);
                    $stmt->bindValue(':type1',                  $_POST['type1'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':rent1',                  $_POST['rent1'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':months1',                $_POST['months1'],               PDO::PARAM_STR);
                    
                    $stmt->execute();
                } catch (Exception $e) {
                    echo 'Connection failed. ' . $e->getMessage();
                }
            }
            
            //If the address already existed - Fields are updated
            else
            {
                
                
                //Using the new method for inserting into the Database
                $con = get_dbconn("PDO");
                $stmt = $con->prepare("UPDATE PREVIOUSRESIDENCE 
                    SET 
                    ApplicationID=:appID,                   PrevStreetAddress=:address1,           PrevCity=:city1,
                    PrevState=:state1,                      PrevZip=:zipCode1,                     PrevLandLordFName=:landlordsFName1,
                    PrevLandLordLName=:landlordsLName1,     PrevPhone=:phoneNumber1,               ReasonForLeaving=:reasonForLeaving1,
                    TypeOfResidence=:type1,                 PrevMonthlyRent=:rent1,                TotalMonths=:months1
                    WHERE PrevResidenceID = '$_POST[number1]'
                    ");
                
                try {
                    $stmt->bindValue(':appID',                  $appID,                          PDO::PARAM_STR);
                    $stmt->bindValue(':address1',               $_POST['address1'],              PDO::PARAM_STR);
                    $stmt->bindValue(':city1',                  $_POST['city1'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':state1',                 $_POST['state1'],                PDO::PARAM_STR);
                    $stmt->bindValue(':zipCode1',               $_POST['zipCode1'],              PDO::PARAM_STR);
                    $stmt->bindValue(':landlordsFName1',        $_POST['landlordsFName1'],       PDO::PARAM_STR);
                    $stmt->bindValue(':landlordsLName1',        $_POST['landlordsLName1'],       PDO::PARAM_STR);
                    $stmt->bindValue(':phoneNumber1',           $_POST['phoneNumber1'],          PDO::PARAM_STR);
                    $stmt->bindValue(':reasonForLeaving1',      $_POST['reasonForLeaving1'],     PDO::PARAM_STR);
                    $stmt->bindValue(':type1',                  $_POST['type1'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':rent1',                  $_POST['rent1'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':months1',                $_POST['months1'],               PDO::PARAM_STR);
                    $stmt->execute();
                } catch (Exception $e) {
                    echo 'Connection failed. ' . $e->getMessage();
                }
                
            }
     
     }
     
     
     
     //IF the address has data in it
     if($_POST[address2] != "")
        {
            //If the address did not exist before fields are created
            if($_POST[number2] == '')
            {
               //Using the new method for inserting into the Database
                $con = get_dbconn("PDO");
                $stmt = $con->prepare("INSERT INTO PREVIOUSRESIDENCE (
                    ApplicationID,              PrevStreetAddress,              PrevCity,
                    PrevState,                  PrevZip,                        PrevLandLordFName,
                    PrevLandLordLName,          PrevPhone,                      ReasonForLeaving,
                    TypeOfResidence,            PrevMonthlyRent,                TotalMonths
                    )
               VALUES (
                    :appID,                     :address2,                      :city2,
                    :state2,                    :zipCode2,                      :landlordsFName2,
                    :landlordsLName2,           :phoneNumber2,                  :reasonForLeaving2,
                    :type2,                     :rent2,                         :months2
                    
               )");
                try {
                    $stmt->bindValue(':appID',                  $appID,                          PDO::PARAM_STR);
                    $stmt->bindValue(':address2',               $_POST['address2'],              PDO::PARAM_STR);
                    $stmt->bindValue(':city2',                  $_POST['city2'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':state2',                 $_POST['state2'],                PDO::PARAM_STR);
                    $stmt->bindValue(':zipCode2',               $_POST['zipCode2'],              PDO::PARAM_STR);
                    $stmt->bindValue(':landlordsFName2',        $_POST['landlordsFName2'],       PDO::PARAM_STR);
                    $stmt->bindValue(':landlordsLName2',        $_POST['landlordsLName2'],       PDO::PARAM_STR);
                    $stmt->bindValue(':phoneNumber2',           $_POST['phoneNumber2'],          PDO::PARAM_STR);
                    $stmt->bindValue(':reasonForLeaving2',      $_POST['reasonForLeaving2'],     PDO::PARAM_STR);
                    $stmt->bindValue(':type2',                  $_POST['type2'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':rent2',                  $_POST['rent2'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':months2',                $_POST['months2'],               PDO::PARAM_STR);
                    
                    $stmt->execute();
                } catch (Exception $e) {
                    echo 'Connection failed. ' . $e->getMessage();
                }
            }
            
            //If the address already existed - Fields are updated
            else
            {
                
                
                //Using the new method for inserting into the Database
                $con = get_dbconn("PDO");
                $stmt = $con->prepare("UPDATE PREVIOUSRESIDENCE 
                    SET 
                    ApplicationID=:appID,                   PrevStreetAddress=:address2,           PrevCity=:city2,
                    PrevState=:state2,                      PrevZip=:zipCode2,                     PrevLandLordFName=:landlordsFName2,
                    PrevLandLordLName=:landlordsLName2,     PrevPhone=:phoneNumber2,               ReasonForLeaving=:reasonForLeaving2,
                    TypeOfResidence=:type2,                 PrevMonthlyRent=:rent2,                TotalMonths=:months2
                    WHERE PrevResidenceID = '$_POST[number2]'
                    ");
                
                try {
                    $stmt->bindValue(':appID',                  $appID,                          PDO::PARAM_STR);
                    $stmt->bindValue(':address2',               $_POST['address2'],              PDO::PARAM_STR);
                    $stmt->bindValue(':city2',                  $_POST['city2'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':state2',                 $_POST['state2'],                PDO::PARAM_STR);
                    $stmt->bindValue(':zipCode2',               $_POST['zipCode2'],              PDO::PARAM_STR);
                    $stmt->bindValue(':landlordsFName2',        $_POST['landlordsFName2'],       PDO::PARAM_STR);
                    $stmt->bindValue(':landlordsLName2',        $_POST['landlordsLName2'],       PDO::PARAM_STR);
                    $stmt->bindValue(':phoneNumber2',           $_POST['phoneNumber2'],          PDO::PARAM_STR);
                    $stmt->bindValue(':reasonForLeaving2',      $_POST['reasonForLeaving2'],     PDO::PARAM_STR);
                    $stmt->bindValue(':type2',                  $_POST['type2'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':rent2',                  $_POST['rent2'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':months2',                $_POST['months2'],               PDO::PARAM_STR);
                    $stmt->execute();
                } catch (Exception $e) {
                    echo 'Connection failed. ' . $e->getMessage();
                }
                
            }
     
     }
     
          //IF the address has data in it
     if($_POST[address3] != "")
        {
            //If the address did not exist before fields are created
            if($_POST[number3] == '')
            {
               //Using the new method for inserting into the Database
                $con = get_dbconn("PDO");
                $stmt = $con->prepare("INSERT INTO PREVIOUSRESIDENCE (
                    ApplicationID,              PrevStreetAddress,              PrevCity,
                    PrevState,                  PrevZip,                        PrevLandLordFName,
                    PrevLandLordLName,          PrevPhone,                      ReasonForLeaving,
                    TypeOfResidence,            PrevMonthlyRent,                TotalMonths
                    )
               VALUES (
                    :appID,                     :address3,                      :city3,
                    :state3,                    :zipCode3,                      :landlordsFName3,
                    :landlordsLName3,           :phoneNumber3,                  :reasonForLeaving3,
                    :type3,                     :rent3,                         :months3
                    
               )");
                try {
                    $stmt->bindValue(':appID',                  $appID,                          PDO::PARAM_STR);
                    $stmt->bindValue(':address3',               $_POST['address3'],              PDO::PARAM_STR);
                    $stmt->bindValue(':city3',                  $_POST['city3'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':state3',                 $_POST['state3'],                PDO::PARAM_STR);
                    $stmt->bindValue(':zipCode3',               $_POST['zipCode3'],              PDO::PARAM_STR);
                    $stmt->bindValue(':landlordsFName3',        $_POST['landlordsFName3'],       PDO::PARAM_STR);
                    $stmt->bindValue(':landlordsLName3',        $_POST['landlordsLName3'],       PDO::PARAM_STR);
                    $stmt->bindValue(':phoneNumber3',           $_POST['phoneNumber3'],          PDO::PARAM_STR);
                    $stmt->bindValue(':reasonForLeaving3',      $_POST['reasonForLeaving3'],     PDO::PARAM_STR);
                    $stmt->bindValue(':type3',                  $_POST['type3'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':rent3',                  $_POST['rent3'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':months3',                $_POST['months3'],               PDO::PARAM_STR);
                    
                    $stmt->execute();
                } catch (Exception $e) {
                    echo 'Connection failed. ' . $e->getMessage();
                }
            }
            
            //If the address already existed - Fields are updated
            else
            {
                
                
                //Using the new method for inserting into the Database
                $con = get_dbconn("PDO");
                $stmt = $con->prepare("UPDATE PREVIOUSRESIDENCE 
                    SET 
                    ApplicationID=:appID,                   PrevStreetAddress=:address3,           PrevCity=:city3,
                    PrevState=:state3,                      PrevZip=:zipCode3,                     PrevLandLordFName=:landlordsFName3,
                    PrevLandLordLName=:landlordsLName3,     PrevPhone=:phoneNumber3,               ReasonForLeaving=:reasonForLeaving3,
                    TypeOfResidence=:type3,                 PrevMonthlyRent=:rent3,                TotalMonths=:months3
                    WHERE PrevResidenceID = '$_POST[number3]'
                    ");
                
                try {
                    $stmt->bindValue(':appID',                  $appID,                          PDO::PARAM_STR);
                    $stmt->bindValue(':address3',               $_POST['address3'],              PDO::PARAM_STR);
                    $stmt->bindValue(':city3',                  $_POST['city3'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':state3',                 $_POST['state3'],                PDO::PARAM_STR);
                    $stmt->bindValue(':zipCode3',               $_POST['zipCode3'],              PDO::PARAM_STR);
                    $stmt->bindValue(':landlordsFName3',        $_POST['landlordsFName3'],       PDO::PARAM_STR);
                    $stmt->bindValue(':landlordsLName3',        $_POST['landlordsLName3'],       PDO::PARAM_STR);
                    $stmt->bindValue(':phoneNumber3',           $_POST['phoneNumber3'],          PDO::PARAM_STR);
                    $stmt->bindValue(':reasonForLeaving3',      $_POST['reasonForLeaving3'],     PDO::PARAM_STR);
                    $stmt->bindValue(':type3',                  $_POST['type3'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':rent3',                  $_POST['rent3'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':months3',                $_POST['months3'],               PDO::PARAM_STR);
                    $stmt->execute();
                } catch (Exception $e) {
                    echo 'Connection failed. ' . $e->getMessage();
                }
                
            }
     
     }
     
          //IF the address has data in it
     if($_POST[address4] != "")
        {
            //If the address did not exist before fields are created
            if($_POST[number4] == '')
            {
               //Using the new method for inserting into the Database
                $con = get_dbconn("PDO");
                $stmt = $con->prepare("INSERT INTO PREVIOUSRESIDENCE (
                    ApplicationID,              PrevStreetAddress,              PrevCity,
                    PrevState,                  PrevZip,                        PrevLandLordFName,
                    PrevLandLordLName,          PrevPhone,                      ReasonForLeaving,
                    TypeOfResidence,            PrevMonthlyRent,                TotalMonths
                    )
               VALUES (
                    :appID,                     :address4,                      :city4,
                    :state4,                    :zipCode4,                      :landlordsFName4,
                    :landlordsLName4,           :phoneNumber4,                  :reasonForLeaving4,
                    :type4,                     :rent4,                         :months4
                    
               )");
                try {
                    $stmt->bindValue(':appID',                  $appID,                          PDO::PARAM_STR);
                    $stmt->bindValue(':address4',               $_POST['address4'],              PDO::PARAM_STR);
                    $stmt->bindValue(':city4',                  $_POST['city4'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':state4',                 $_POST['state4'],                PDO::PARAM_STR);
                    $stmt->bindValue(':zipCode4',               $_POST['zipCode4'],              PDO::PARAM_STR);
                    $stmt->bindValue(':landlordsFName4',        $_POST['landlordsFName4'],       PDO::PARAM_STR);
                    $stmt->bindValue(':landlordsLName4',        $_POST['landlordsLName4'],       PDO::PARAM_STR);
                    $stmt->bindValue(':phoneNumber4',           $_POST['phoneNumber4'],          PDO::PARAM_STR);
                    $stmt->bindValue(':reasonForLeaving4',      $_POST['reasonForLeaving4'],     PDO::PARAM_STR);
                    $stmt->bindValue(':type4',                  $_POST['type4'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':rent4',                  $_POST['rent4'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':months4',                $_POST['months4'],               PDO::PARAM_STR);
                    
                    $stmt->execute();
                } catch (Exception $e) {
                    echo 'Connection failed. ' . $e->getMessage();
                }
            }
            
            //If the address already existed - Fields are updated
            else
            {
                
                
                //Using the new method for inserting into the Database
                $con = get_dbconn("PDO");
                $stmt = $con->prepare("UPDATE PREVIOUSRESIDENCE 
                    SET 
                    ApplicationID=:appID,                   PrevStreetAddress=:address4,           PrevCity=:city4,
                    PrevState=:state4,                      PrevZip=:zipCode4,                     PrevLandLordFName=:landlordsFName4,
                    PrevLandLordLName=:landlordsLName4,     PrevPhone=:phoneNumber4,               ReasonForLeaving=:reasonForLeaving4,
                    TypeOfResidence=:type4,                 PrevMonthlyRent=:rent4,                TotalMonths=:months4
                    WHERE PrevResidenceID = '$_POST[number4]'
                    ");
                
                try {
                    $stmt->bindValue(':appID',                  $appID,                          PDO::PARAM_STR);
                    $stmt->bindValue(':address4',               $_POST['address4'],              PDO::PARAM_STR);
                    $stmt->bindValue(':city4',                  $_POST['city4'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':state4',                 $_POST['state4'],                PDO::PARAM_STR);
                    $stmt->bindValue(':zipCode4',               $_POST['zipCode4'],              PDO::PARAM_STR);
                    $stmt->bindValue(':landlordsFName4',        $_POST['landlordsFName4'],       PDO::PARAM_STR);
                    $stmt->bindValue(':landlordsLName4',        $_POST['landlordsLName4'],       PDO::PARAM_STR);
                    $stmt->bindValue(':phoneNumber4',           $_POST['phoneNumber4'],          PDO::PARAM_STR);
                    $stmt->bindValue(':reasonForLeaving4',      $_POST['reasonForLeaving4'],     PDO::PARAM_STR);
                    $stmt->bindValue(':type4',                  $_POST['type4'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':rent4',                  $_POST['rent4'],                 PDO::PARAM_STR);
                    $stmt->bindValue(':months4',                $_POST['months4'],               PDO::PARAM_STR);
                    $stmt->execute();
                } catch (Exception $e) {
                    echo 'Connection failed. ' . $e->getMessage();
                }
                
            }
     
     }
     
     
    //Using the new method for inserting into the Database
    $con = get_dbconn("PDO");
    $stmt = $con->prepare("
            UPDATE APPLICATION SET
                HasCrimHist=:felony,               HasEvictHist=:evicted,             HasBankruptHist=:bankruptcy,
                BankruptHistDesc=:ifYesBankruptcy, TotalConsumerDebt=:devitCardDebt,  MonthlyDebtPayment=:monthlyPayments,
                TotalLoanDebt=:loans,              TotalAssets=:equity,               CrimHistDesc=:ifYesFelony,
                EvictHistDescription=:ifYesEvicted
                
            WHERE UserID='$_SESSION[userID]'
            ");
    try {
        $stmt->bindValue(':felony',             $_POST['felony'],                PDO::PARAM_STR);
        $stmt->bindValue(':evicted',            $_POST['evicted'],               PDO::PARAM_STR);
        $stmt->bindValue(':bankruptcy',         $_POST['bankruptcy'],            PDO::PARAM_STR);
        $stmt->bindValue(':devitCardDebt', 	$_POST['devitCardDebt'],         PDO::PARAM_STR);
        $stmt->bindValue(':monthlyPayments', 	$_POST['monthlyPayments'],       PDO::PARAM_STR);
        $stmt->bindValue(':loans',              $_POST['loans'],                 PDO::PARAM_STR);
        $stmt->bindValue(':equity',             $_POST['equity'],                PDO::PARAM_STR);
        $stmt->bindValue(':ifYesBankruptcy', 	$_POST['ifYesBankruptcy'],       PDO::PARAM_STR);
        $stmt->bindValue(':ifYesFelony', 	$_POST['ifYesFelony'],           PDO::PARAM_STR);
        $stmt->bindValue(':ifYesEvicted', 	$_POST['ifYesEvicted'],          PDO::PARAM_STR);
        

        $stmt->execute();
    } catch (Exception $e) {
	echo 'Connection failed at update. ' . $e->getMessage();
    }
        
    //Setting which page has been compleated.  If the form has already been compleated it ignors this
    if($row[PageCompleted] != "6")
    {
        
        mysql_query("UPDATE APPLICATION SET PageCompleted='4'
        WHERE UserID = '$_SESSION[userID]'");
    }
    

    mysql_close();
    
    //rerouting the user to the next application page
    header( 'Location: /newHousingApplication4.php' );
?>
