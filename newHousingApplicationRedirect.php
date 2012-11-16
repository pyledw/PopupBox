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
    
    

    //Creating a conneciton to the Database and setting the variables needed
    include_once 'config.inc.php';
    $con = get_dbconn("");
    
    //Query getting the application data for this user
    $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='" . $_SESSION[userID] . "'");

    //setting the query data equal to a variable
    $row = mysql_fetch_array($result);
    
    
    if(mysql_num_rows($result) == 0)
    {
    //Using the new method for inserting into the Database
    $con = get_dbconn("PDO");
    $stmt = $con->prepare("
            INSERT INTO APPLICATION (
                NumOtherOccupants,        SecondaryOccupantFName,                UserID,                    EarlyMoveIn,
                LateMoveIn,               IsADA,                                 IsSmokingRequired,         SecondaryOccupantAge, 
                SecondaryOccupantRelationship,                                   Pet1Type,                  Pet1Breed,
                Pet1Age,                  Pet1Weight,                            Pet2Type,                  Pet2Breed,
                Pet2Age,                  Pet2Weight,                            Pet3Type,                  Pet3Breed,
                Pet3Age,                  Pet3Weight,                            SecondaryOccupantLName
                 )
            VALUES (
                :numbOccupants,           :fName,                  :userID,               :earliestDate,
                :latestDate,              :ADA,                    :smoking,
                :age,                     :relationship,           :animalType,           :animalBreed,
                :animalAge,               :animalWeight,           :animalType2,          :animalBreed2,
                :animalAge2,              :animalWeight2,          :animalType3,          :animalBreed3,
                :animalAge3,              :animalWeight3,          :lName )
            ");
    try {
        $stmt->bindValue(':numbOccupants',  $_POST['numbOccupants'],		PDO::PARAM_INT);
        $stmt->bindValue(':fName', 	    $_POST['fName'],                    PDO::PARAM_STR);
        $stmt->bindValue(':userID',         $_SESSION['userID'],                PDO::PARAM_STR);
        $stmt->bindValue(':earliestDate',   $_POST['email1'],                   PDO::PARAM_STR);
        $stmt->bindValue(':latestDate',     $_POST['latestDate'],               PDO::PARAM_STR);
        $stmt->bindValue(':ADA',            $_POST['ADA'],                      PDO::PARAM_INT);
        $stmt->bindValue(':smoking',        $_POST['smoking'],                  PDO::PARAM_INT);
        $stmt->bindValue(':age',            $_POST['age'],                      PDO::PARAM_INT);
        $stmt->bindValue(':relationship',   $_POST['relationship'],             PDO::PARAM_STR);
        $stmt->bindValue(':animalType',     $_POST['animalType'],               PDO::PARAM_STR);
        $stmt->bindValue(':animalBreed',    $_POST['animalBreed'],              PDO::PARAM_STR);
        $stmt->bindValue(':animalAge',      $_POST['animalAge'],                PDO::PARAM_INT);
        $stmt->bindValue(':animalWeight',   $_POST['animalWeight'],             PDO::PARAM_INT);
        $stmt->bindValue(':animalType2',    $_POST['animalType2'],              PDO::PARAM_STR);
        $stmt->bindValue(':animalBreed2',   $_POST['animalBreed2'],             PDO::PARAM_STR);
        $stmt->bindValue(':animalAge2',     $_POST['animalAge2'],               PDO::PARAM_INT);
        $stmt->bindValue(':animalWeight2',  $_POST['animalWeight2'],            PDO::PARAM_INT);
        $stmt->bindValue(':animalType3',    $_POST['animalType3'],              PDO::PARAM_STR);
        $stmt->bindValue(':animalBreed3',   $_POST['animalBreed3'],             PDO::PARAM_STR);
        $stmt->bindValue(':animalAge3',     $_POST['animalAge3'],               PDO::PARAM_INT);
        $stmt->bindValue(':animalWeight3',  $_POST['animalWeight3'],            PDO::PARAM_INT);
        $stmt->bindValue(':lName',          $_POST['lName'],                    PDO::PARAM_STR);
        $stmt->execute();
    } catch (Exception $e) {
	echo 'Connection failed. ' . $e->getMessage();
    }

    echo "1 record added";
    }
    
    else
    {
        
    //Using the new method for inserting into the Database
    $con = get_dbconn("PDO");
    $stmt = $con->prepare("
            UPDATE APPLICATION SET
                NumOtherOccupants=:numbOccupants,               SecondaryOccupantFName=:fName,      UserID=:userID,                    EarlyMoveIn=:earliestDate,
                LateMoveIn=:latestDate,                         IsADA=:ADA,                         IsSmokingRequired=:smoking,        SecondaryOccupantAge=:age, 
                SecondaryOccupantRelationship=:relationship,    Pet1Type=:animalType,               Pet1Breed=:animalBreed,            Pet1Age=:animalAge,     
                Pet1Weight=:animalWeight,                       Pet2Type=:animalType2,              Pet2Breed=:animalBreed2,           Pet2Age=:animalAge2,
                Pet2Weight=:animalWeight2,                      Pet3Type=:animalType3,              Pet3Breed=:animalBreed3,           Pet3Age=:animalAge3,
                Pet3Weight=:animalWeight3,                      SecondaryOccupantLName=:lName
                
            WHERE UserID='$_SESSION[userID]'
            ");
    try {
        $stmt->bindValue(':numbOccupants',  $_POST['numbOccupants'],		PDO::PARAM_INT);
        $stmt->bindValue(':fName', 	    $_POST['fName'],                    PDO::PARAM_STR);
        $stmt->bindValue(':userID',         $_SESSION['userID'],                PDO::PARAM_STR);
        $stmt->bindValue(':earliestDate',   $_POST['earliestDate'],             PDO::PARAM_STR);
        $stmt->bindValue(':latestDate',     $_POST['latestDate'],               PDO::PARAM_STR);
        $stmt->bindValue(':ADA',            $_POST['ADA'],                      PDO::PARAM_INT);
        $stmt->bindValue(':smoking',        $_POST['smoking'],                  PDO::PARAM_INT);
        $stmt->bindValue(':age',            $_POST['age'],                      PDO::PARAM_INT);
        $stmt->bindValue(':relationship',   $_POST['relationship'],             PDO::PARAM_STR);
        $stmt->bindValue(':animalType',     $_POST['animalType'],               PDO::PARAM_STR);
        $stmt->bindValue(':animalBreed',    $_POST['animalBreed'],              PDO::PARAM_STR);
        $stmt->bindValue(':animalAge',      $_POST['animalAge'],                PDO::PARAM_INT);
        $stmt->bindValue(':animalWeight',   $_POST['animalWeight'],             PDO::PARAM_INT);
        $stmt->bindValue(':animalType2',    $_POST['animalType2'],              PDO::PARAM_STR);
        $stmt->bindValue(':animalBreed2',   $_POST['animalBreed2'],             PDO::PARAM_STR);
        $stmt->bindValue(':animalAge2',     $_POST['animalAge2'],               PDO::PARAM_INT);
        $stmt->bindValue(':animalWeight2',  $_POST['animalWeight2'],            PDO::PARAM_INT);
        $stmt->bindValue(':animalType3',    $_POST['animalType3'],              PDO::PARAM_STR);
        $stmt->bindValue(':animalBreed3',   $_POST['animalBreed3'],             PDO::PARAM_STR);
        $stmt->bindValue(':animalAge3',     $_POST['animalAge3'],               PDO::PARAM_INT);
        $stmt->bindValue(':animalWeight3',  $_POST['animalWeight3'],            PDO::PARAM_INT);
        $stmt->bindValue(':lName',          $_POST['lName'],                    PDO::PARAM_STR);
        $stmt->execute();
    } catch (Exception $e) {
	echo 'Connection failed. ' . $e->getMessage();
    }

    echo "1 record UPDATED";
    }
    
    
    //Setting which page has been compleated.  If the form has already been compleated it ignors this
    if($row[PageCompleted] != "6")
    {
        
        mysql_query("UPDATE APPLICATION SET PageCompleted='2'
        WHERE UserID = '$_SESSION[userID]'");
    }
    
     
    mysql_close();
    
    //Rerouting to the next page
    header( 'Location: /newHousingApplication2.php' );
?>
