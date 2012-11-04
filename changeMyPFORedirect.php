<?php


$BidID = $_POST[bidID];

include_once 'config.inc.php';

$con = get_dbconn("PDO");
    $stmt = $con->prepare("
            UPDATE BID SET
                MonthlyRate=:monthlyRate
            WHERE BidID='$BidID'
            ");
    try {
        $stmt->bindValue(':monthlyRent',          $_POST['bid'],                   PDO::PARAM_STR);

    } catch (Exception $e) {
	echo 'Connection failed. ' . $e->getMessage();
    }

?>
