<?php
session_start();
    

    require_once "config.inc.php";
    
    //Using the new method for inserting into the Database
    $con = get_dbconn("PDO");
    $stmt = $con->prepare("
            UPDATE PROPERTY SET
                DateAvailable=:available,                   DatePFOAccept=:acceptingPFO,                 DatePFOEndAccept=:stopAcceptingPFO,
                DateTimeOpenHouse1=:openHouse1,             DateTimeOpenHouse2=:openHouse2,              StartingBid=:startingBid,
                MinBidIncrement=:bidIncrement,              RequiredDeposit=:requiredDeposit,            RentNowRate=:rentItNowRate,
                MinimumTerm=:minTerm,                       PreMarket=:comingSoon
                
            WHERE PropertyID='$_SESSION[propertyID]'
            ");
    try {
        $stmt->bindValue(':available',              $_POST['available'],		PDO::PARAM_STR);
        $stmt->bindValue(':acceptingPFO',           $_POST['acceptingPFO'],		PDO::PARAM_STR);
        $stmt->bindValue(':stopAcceptingPFO',       $_POST['stopAcceptingPFO'],		PDO::PARAM_STR);
        $stmt->bindValue(':openHouse1',             $_POST['openHouse1'],		PDO::PARAM_STR);
        $stmt->bindValue(':openHouse2',             $_POST['openHouse2'],		PDO::PARAM_STR);
        $stmt->bindValue(':startingBid',            $_POST['startingBid'],		PDO::PARAM_STR);
        $stmt->bindValue(':bidIncrement',           $_POST['bidIncrement'],		PDO::PARAM_STR);
        $stmt->bindValue(':requiredDeposit',        $_POST['requiredDeposit'],		PDO::PARAM_STR);
        $stmt->bindValue(':rentItNowRate',          $_POST['rentItNowRate'],		PDO::PARAM_STR);
        $stmt->bindValue(':minTerm',                $_POST['minTerm'],                  PDO::PARAM_STR);
        $stmt->bindValue(':comingSoon',             $_POST['comingSoon'],		PDO::PARAM_STR);

        
        $stmt->execute();
    } catch (Exception $e) {
	echo 'Connection failed. ' . $e->getMessage();
    }
    
    $con = get_dbconn("");

    mysql_close();
    
    header( 'Location: /newListing4.php' );
?>
