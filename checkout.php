<?php
session_start();
include_once 'feeprocessing.inc.php';


$feeType = $_SESSION['fee-type'];

if(!isset($feeType))
{
	header('Location: myHood.php');
}

require_once ("config.inc.php");
require_once ("paypal.inc.php");
require_once ("log.inc.php");

$fee = $cfg_fees[$feeType];
logdebug('Fee is: ' . print_r($fee, true);
$resArray = SetExpressCheckoutDG($fee['description'], $fee['price'], $fee['paypal-return'], $fee['paypal-cancel']);
logdebug('Result of SetExpressCheckoutDG: ' . print_r($resArray, true));

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
