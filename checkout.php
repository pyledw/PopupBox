<?php
require_once ("paypal.inc.php");

$resArray = SetExpressCheckoutDG("My Little Pony", "15.00");

$ack = strtoupper($resArray["ACK"]);
if($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING")
{
        $token = urldecode($resArray["TOKEN"]);
       RedirectToPayPalDG( $token );
} 
else  
{
        //Display a user friendly Error on the page using any of the following error information returned by PayPal
        $ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
        $ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
        $ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
        $ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
                
        echo "SetExpressCheckout API call failed. ";
        echo "Detailed Error Message: " . $ErrorLongMsg;
        echo "Short Error Message: " . $ErrorShortMsg;
        echo "Error Code: " . $ErrorCode;
        echo "Error Severity Code: " . $ErrorSeverityCode;
}
?>
