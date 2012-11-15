<?php
session_start();


    require_once "config.inc.php";
    
    //Using the new method for inserting into the Database
    $con = get_dbconn("PDO");
    $stmt = $con->prepare("
            UPDATE PROPERTY SET
                AllowCriminalHistory=:criminalHistory,              MinimumSalary=:minSalary,           AllowSmoking=:smoking,
                AllowCats=:cats,                                    AllowDogs=:dogs,                    AllowPetDepositRefund=:petDepositRefundable,
                PetDepost=:petdeposit
                
            WHERE PropertyID='$_SESSION[propertyID]'
            ");
    try {
        $stmt->bindValue(':criminalHistory',        $_POST['criminalHistory'],		PDO::PARAM_STR);
        $stmt->bindValue(':minSalary',              $_POST['minSalary'],		PDO::PARAM_STR);
        $stmt->bindValue(':smoking',                $_POST['smoking'],                  PDO::PARAM_STR);
        $stmt->bindValue(':cats',                   $_POST['cats'],                     PDO::PARAM_STR);
        $stmt->bindValue(':dogs',                   $_POST['dogs'],                     PDO::PARAM_STR);
        $stmt->bindValue(':petDepositRefundable',   $_POST['petDepositRefundable'],	PDO::PARAM_STR);
        $stmt->bindValue(':petdeposit',             $_POST['petdeposit'],		PDO::PARAM_STR);
        
        $stmt->execute();
    } catch (Exception $e) {
	echo 'Connection failed. ' . $e->getMessage();
    }
    
    
    $con = get_dbconn("");
    $result = mysql_query("SELECT PageCompleted FROM PROPERTY
        WHERE PropertyID='$_SESSION[propertyID]'");
    
     if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
    $row = mysql_fetch_array($result);
    
    echo $row[PageCompleted];
    
    //Setting which page has been compleated.  If the form has already been compleated it ignors this
    if($row[PageCompleted] != "6")
    {
        
        mysql_query("UPDATE PROPERTY SET PageCompleted='5'
        WHERE PropertyID='$_SESSION[propertyID]'");
    }

    
    header( 'Location: /newListing5.php' );
?>
