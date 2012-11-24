<?php
session_start();

class FeeProcessing
{
	const STATUS_BEGIN = 1;
	const STATUS_SUCCESS = 2;
	const STATUS_CANCEL = 3;
	const STATUS_ERROR = 4;

	const SERVICE_PAYPAL = 1;

	const FEE_TYPE_LISTING = 1;
	const FEE_TYPE_APPLICATION = 2;

	public function write_listing_fee_record($userid, $propertyid, $token, $price)
	{
	    $con = get_dbconn("PDO");
    	$stmt = $con->prepare("
              INSERT INTO FEE 
                  (UserID, FeeType, Amount, PropertyID, PaymentServiceID, PaymentToken, 
	               TransactionStatusID) 
              VALUES
    	          (:userid, :feetype, :amount, :propertyid, :serviceid, :token, :statusid)");

    	$stmt->bindValue(':userid',     $userid,                PDO::PARAM_INT);
	    $stmt->bindValue(':feetype',    self::FEE_TYPE_LISTING, PDO::PARAM_INT);
    	$stmt->bindValue(':amount',     $price,                 PDO::PARAM_STR);
    	$stmt->bindValue(':propertyid', $propertyid,            PDO::PARAM_INT);
	    $stmt->bindValue(':serviceid',  self::SERVICE_PAYPAL,   PDO::PARAM_INT);
    	$stmt->bindValue(':token',      $token,                 PDO::PARAM_STR);
	    $stmt->bindValue(':statusid',   self::STATUS_BEGIN,     PDO::PARAM_INT);

    	$stmt->execute();
	}

    public function write_application_fee_record($userid, $applicationid, $token, $price)
    {
        $con = get_dbconn("PDO");
        $stmt = $con->prepare("
              INSERT INTO FEE
                  (UserID, FeeType, Amount, ApplicationID, PaymentServiceID, PaymentToken,
                   TransactionStatusID)
              VALUES
                  (:userid, :feetype, :amount, :appid, :serviceid, :token, :statusid)");

        $stmt->bindValue(':userid',    $userid,                    PDO::PARAM_INT);
        $stmt->bindValue(':feetype',   self::FEE_TYPE_APPLICATION, PDO::PARAM_INT);
        $stmt->bindValue(':amount',    $price,                     PDO::PARAM_STR);
        $stmt->bindValue(':appid',     $auctionid,                 PDO::PARAM_INT);
        $stmt->bindValue(':serviceid', self::SERVICE_PAYPAL,       PDO::PARAM_INT);
        $stmt->bindValue(':token',     $token,                     PDO::PARAM_STR);
        $stmt->bindValue(':statusid',  self::STATUS_BEGIN,         PDO::PARAM_INT);

        $stmt->execute();
    }

}

$feeType = $_SESSION['fee-type'];
if(!isset($feeType))
{
	header('Location: myHood.php');
}

require_once ("config.inc.php");
require_once ("paypal.inc.php");
require_once ("log.inc.php");


$resArray = SetExpressCheckoutDG($feeDescriptions[$feeType], $feePrices[$feeType]);
logdebug('Fee type is: ' . $feeType);
logdebug('Description is: ' . $feeDescriptions[$feeType]);
logdebug('Price is: ' . $feePrices[$feeType]);


$ack = strtoupper($resArray["ACK"]);
if($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING")
{
    $token = urldecode($resArray["TOKEN"]);
	
	


    RedirectToPayPalDG( $token );
} 
else  
{
        //Log a Error using any of the following error information returned by PayPal
        $ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
        $ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
        $ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
        $ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);

        logerror("SetExpressCheckout API call failed. ");
        logerror("Detailed Error Message: " . $ErrorLongMsg);
        logerror("Short Error Message: " . $ErrorShortMsg);
        logerror("Error Code: " . $ErrorCode);
        logerror("Error Severity Code: " . $ErrorSeverityCode);
}
?>
