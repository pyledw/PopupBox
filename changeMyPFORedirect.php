<?php
/**
 * This page changes the previus users bid to the new bid if an old one exist
 * otherwise it will create a new bid in the BID table with the needed informaiton.
 * 
 * @author David Pyle <Pyledw@Gmail.com>
 * 
 */

$BidID = $_POST[bidID];

echo $BidID;
echo $_POST[bid];
include_once 'config.inc.php';

$con = get_dbconn("PDO");
    $stmt = $con->prepare("
            UPDATE BID SET
                MonthlyRate=:monthlyRate, TimeReceived=:time
            WHERE BidID='$BidID'
            ");
    try {
        $stmt->bindValue(':monthlyRate',          $_POST['bid'],                   PDO::PARAM_STR);
        $stmt->bindValue(':time',                 date('yy-mm-dd hh:mm:ss'),       PDO::PARAM_STR);
        $stmt->execute();

    } catch (Exception $e) 
    {
	echo 'Connection failed. ' . $e->getMessage();
    }

    header( 'Location: /myHood.php' );
?>
