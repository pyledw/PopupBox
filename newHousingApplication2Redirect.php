<?php
    /** 
     * This redirect will get all of the inforamiton from the previus page in a form post.
     * It will check the database to see if an applicaiton is already on file.
     * It will then insert the new applicaiton info into the APPLICATION table or Update
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
    $con= get_dbconn("");

    //Query that is retrieving the data from the application of the user
    $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='" . $_SESSION['userID'] . "'");

    //Casting the query data onto a variable
    $row = mysql_fetch_array($result);

    //Using the new method for inserting into the Database
    $con = get_dbconn("PDO");
    $stmt = $con->prepare("
            UPDATE APPLICATION SET
                CurrentEmployerName=:employerName1,             CurrentSupFName=:superVisorFName1,          CurentSupLName=:superVisorLName1,
                CurrentSupPhone=:superVisorPhone1,              CurrentPositionName=:position1,             CurrentMonthsEmployed=:monthsEmployed1,
                CurrentAnnualSalary=:annualSalary1,             PrevEmployerName=:employerName2,            PrevSupFName=:superVisorFName2,
                PrevSupLName=:superVisorLName2,                 PrevSupPhone=:superVisorPhone2,             PrevPositionName=:position2,
                PrevMonthsEmployed=:monthsEmployed2,            PrevAnnualSalary=:annualSalary2,            CoAppEmployerName=:coAppEmployerName1,
                CoAppSupFName=:coAppSuperVisorFName1,           CoAppSupLName=:coAppSuperVisorLName1,       CoAppSupPhone=:coAppSuperVisorPhone1,
                CoAppPositionName=:coAppPosition1,              CoAppMonthsEmployed=:coAppMonthsEmployed1,  CoAppAnnualSalary=:coAppAnnualSalary1
                
            WHERE UserID='".$_SESSION['userID']."'
            ");
    try {
        $stmt->bindValue(':employerName1',          $_POST['employerName1'],                   PDO::PARAM_STR);
        $stmt->bindValue(':superVisorFName1', 	    $_POST['superVisorFName1'],                PDO::PARAM_STR);
        $stmt->bindValue(':superVisorLName1', 	    $_POST['superVisorLName1'],                PDO::PARAM_STR);
        $stmt->bindValue(':superVisorPhone1', 	    $_POST['superVisorPhone1'],                PDO::PARAM_STR);
        $stmt->bindValue(':position1',              $_POST['position1'],                       PDO::PARAM_STR);
        $stmt->bindValue(':monthsEmployed1', 	    $_POST['monthsEmployed1'],                 PDO::PARAM_STR);
        $stmt->bindValue(':annualSalary1', 	    $_POST['annualSalary1'],                   PDO::PARAM_INT);
        $stmt->bindValue(':employerName2', 	    $_POST['employerName2'],                   PDO::PARAM_STR);
        $stmt->bindValue(':superVisorFName2', 	    $_POST['superVisorFName2'],                PDO::PARAM_STR);
        $stmt->bindValue(':superVisorLName2', 	    $_POST['superVisorLName2'],                PDO::PARAM_STR);
        $stmt->bindValue(':superVisorPhone2', 	    $_POST['superVisorPhone2'],                PDO::PARAM_STR);
        $stmt->bindValue(':position2',              $_POST['position2'],                       PDO::PARAM_STR);
        $stmt->bindValue(':monthsEmployed2', 	    $_POST['monthsEmployed2'],                 PDO::PARAM_STR);
        $stmt->bindValue(':annualSalary2', 	    $_POST['annualSalary2'],                   PDO::PARAM_INT);
        $stmt->bindValue(':coAppEmployerName1',     $_POST['coAppEmployerName1'],              PDO::PARAM_STR);
        $stmt->bindValue(':coAppSuperVisorFName1',  $_POST['coAppSuperVisorFName1'],           PDO::PARAM_STR);
        $stmt->bindValue(':coAppSuperVisorLName1',  $_POST['coAppSuperVisorLName1'],           PDO::PARAM_STR);
        $stmt->bindValue(':coAppSuperVisorPhone1',  $_POST['coAppSuperVisorPhone1'],           PDO::PARAM_STR);
        $stmt->bindValue(':coAppPosition1', 	    $_POST['coAppPosition1'],                  PDO::PARAM_STR);
        $stmt->bindValue(':coAppMonthsEmployed1',   $_POST['coAppMonthsEmployed1'],            PDO::PARAM_STR);
        $stmt->bindValue(':coAppAnnualSalary1',     $_POST['coAppAnnualSalary1'],              PDO::PARAM_INT);
        $stmt->execute();
    } catch (Exception $e) {
	echo 'Connection failed. ' . $e->getMessage();
    }

    echo "1 record UPDATED";
    
    //Setting which page has been compleated.  If the form has already been compleated it ignors this
    if($row[PageCompleted] != "6")
    {
        
        mysql_query("UPDATE APPLICATION SET PageCompleted='2'
        WHERE UserID ='".$_SESSION['userID']."'");
    }
    
    mysql_close();
    
    header( 'Location: /newHousingApplication3.php' );
?>
