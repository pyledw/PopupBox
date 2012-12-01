<?php

    /** 
     * This redirect will get all of the inforamiton from the previus page in a form post.
     * It will check the database to see if an application is already on file.
     * It will then insert the new application info into the APPLICATION table or Update
     * the previus info acordingly.
     * 
     * It finaly checks to see if the user application was completed, and if it was not
     * it will update the pagecompleted field to the correct page.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */

    session_start();
    
    include_once 'config.inc.php';
        //Connecting to the sql database
    
    
    //Using the new method for inserting into the Database
    $con = get_dbconn("PDO");
    $stmt = $con->prepare("
            UPDATE APPLICATION SET
                ContactFName=:Fname,            ContactLName=:Lname,                    ContactAddress=:address,
                ContactState=:state,            ContactZip=:zip,                        ContactRelation=:relation,
                ContactHomePhone=:homePhone,    ContactWorkPhone=:workPhone,            ContactCellPhone=:cellPhone,
                Vehicle1Desc=:carMake,          Vehicle1LicenseNo=:carLicenseNumber,    Vehicle1LicenseState=:carPlateState,
                Vehicle2Desc=:carMake2,         Vehicle2LicenseNo=:carLicenseNumber2,   Vehicle2LicenseState=:carPlateState2,
                Vehicle3Desc=:carMake3,         Vehicle3LicenseNo=:carLicenseNumber3,   Vehicle3LicenseState=:carPlateState3,
                Vehicle4Desc=:carMake4,         Vehicle4LicenseNo=:carLicenseNumber4,   Vehicle4LicenseState=:carPlateState4
                
            WHERE UserID='$_SESSION[userID]'
            ");
    try {
        $stmt->bindValue(':Fname',              $_POST['Fname'],             PDO::PARAM_STR);
        $stmt->bindValue(':Lname',              $_POST['Lname'],             PDO::PARAM_STR);
        $stmt->bindValue(':address',            $_POST['address'],           PDO::PARAM_STR);
        $stmt->bindValue(':state',              $_POST['state'],             PDO::PARAM_STR);
        $stmt->bindValue(':zip',                $_POST['zip'],               PDO::PARAM_STR);
        $stmt->bindValue(':relation',           $_POST['relation'],          PDO::PARAM_STR);
        $stmt->bindValue(':homePhone',          $_POST['homePhone'],         PDO::PARAM_STR);
        $stmt->bindValue(':workPhone',          $_POST['workPhone'],         PDO::PARAM_STR);
        $stmt->bindValue(':cellPhone',          $_POST['cellPhone'],         PDO::PARAM_STR);
        $stmt->bindValue(':carMake',            $_POST['carMake'],           PDO::PARAM_STR);
        $stmt->bindValue(':carLicenseNumber', 	$_POST['carLicenseNumber'],  PDO::PARAM_STR);
        $stmt->bindValue(':carPlateState', 	$_POST['carPlateState'],     PDO::PARAM_STR);
        $stmt->bindValue(':carMake2',           $_POST['carMake2'],          PDO::PARAM_STR);
        $stmt->bindValue(':carLicenseNumber2', 	$_POST['carLicenseNumber2'], PDO::PARAM_STR);
        $stmt->bindValue(':carPlateState2', 	$_POST['carPlateState2'],    PDO::PARAM_STR);
        $stmt->bindValue(':carMake3',           $_POST['carMake3'],          PDO::PARAM_STR);
        $stmt->bindValue(':carLicenseNumber3', 	$_POST['carLicenseNumber3'], PDO::PARAM_STR);
        $stmt->bindValue(':carPlateState3', 	$_POST['carPlateState3'],    PDO::PARAM_STR);
        $stmt->bindValue(':carMake4',           $_POST['carMake4'],          PDO::PARAM_STR);
        $stmt->bindValue(':carLicenseNumber4', 	$_POST['carLicenseNumber4'], PDO::PARAM_STR);
        $stmt->bindValue(':carPlateState4', 	$_POST['carPlateState4'],    PDO::PARAM_STR);

        $stmt->execute();
    } catch (Exception $e) {
	echo 'Connection failed. ' . $e->getMessage();
    }
    
    
    $con = get_dbconn(""); 
    
    //Query to retrieve the application of the user
    $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='$_SESSION[userID]'");
    
    //Casting the query results on to $row
    $row = mysql_fetch_array($result);
    echo $row[PageCompleted];
    //Setting which page has been compleated.  If the form has already been compleated it ignors this
    if($row[PageCompleted] != "6")
    {
        
        mysql_query("UPDATE APPLICATION SET PageCompleted='5'
        WHERE UserID = '$_SESSION[userID]'");
    }
    
    mysql_close();
    
    header( 'Location: /newHousingApplication5.php' );
?>
