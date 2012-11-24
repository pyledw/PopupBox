<?
/**
 *
 * This step is required to get parameters to make DoExpressCheckout API call.
 *
 */

require_once ("paypal.inc.php");
$res = GetExpressCheckoutDetails( $_REQUEST['token'] );

/*
	This is what $res looks like:
Array
(
    [TOKEN] => EC-1P340842TC720374S
    [CHECKOUTSTATUS] => PaymentActionNotInitiated
    [TIMESTAMP] => 2012-11-10T03:20:07Z
    [CORRELATIONID] => ff19b35eaf924
    [ACK] => Success
    [VERSION] => 84
    [BUILD] => 4181146
    [EMAIL] => jcdick_1350762354_per@mail.lipscomb.edu
    [PAYERID] => X66UYGRDF5BUW
    [PAYERSTATUS] => verified
    [FIRSTNAME] => Jason
    [LASTNAME] => Dickinson
    [COUNTRYCODE] => US
    [CURRENCYCODE] => USD
    [AMT] => 15.00
    [ITEMAMT] => 15.00
    [SHIPPINGAMT] => 0.00
    [HANDLINGAMT] => 0.00
    [TAXAMT] => 0.00
    [INSURANCEAMT] => 0.00
    [SHIPDISCAMT] => 0.00
    [L_NAME0] => My Little Pony
    [L_QTY0] => 1
    [L_TAXAMT0] => 0.00
    [L_AMT0] => 15.00
    [L_ITEMWEIGHTVALUE0] =>    0.00000
    [L_ITEMLENGTHVALUE0] =>    0.00000
    [L_ITEMWIDTHVALUE0] =>    0.00000
    [L_ITEMHEIGHTVALUE0] =>    0.00000
    [L_ITEMCATEGORY0] => Digital
    [PAYMENTREQUEST_0_CURRENCYCODE] => USD
    [PAYMENTREQUEST_0_AMT] => 15.00
    [PAYMENTREQUEST_0_ITEMAMT] => 15.00
    [PAYMENTREQUEST_0_SHIPPINGAMT] => 0.00
    [PAYMENTREQUEST_0_HANDLINGAMT] => 0.00
    [PAYMENTREQUEST_0_TAXAMT] => 0.00
    [PAYMENTREQUEST_0_INSURANCEAMT] => 0.00
    [PAYMENTREQUEST_0_SHIPDISCAMT] => 0.00
    [PAYMENTREQUEST_0_INSURANCEOPTIONOFFERED] => false
    [L_PAYMENTREQUEST_0_NAME0] => My Little Pony
    [L_PAYMENTREQUEST_0_QTY0] => 1
    [L_PAYMENTREQUEST_0_TAXAMT0] => 0.00
    [L_PAYMENTREQUEST_0_AMT0] => 15.00
    [L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE0] =>    0.00000
    [L_PAYMENTREQUEST_0_ITEMLENGTHVALUE0] =>    0.00000
    [L_PAYMENTREQUEST_0_ITEMWIDTHVALUE0] =>    0.00000
    [L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE0] =>    0.00000
    [L_PAYMENTREQUEST_0_ITEMCATEGORY0] => Digital
    [PAYMENTREQUESTINFO_0_ERRORCODE] => 0
)
*/



/*
 '------------------------------------
 ' The paymentAmount is the total value of
 ' the purchase. 
 '------------------------------------
 */
$finalPaymentAmount =  $res["AMT"];

/*
 '------------------------------------
 ' Calls the DoExpressCheckoutPayment API call
 '
 ' The ConfirmPayment function is defined in the file paypal.inc.php,
 ' that is included at the top of this file.
 '-------------------------------------------------
 */
//Format the  parameters that were stored or received from GetExperessCheckout call.
$token 				= $_REQUEST['token'];
$payerID 			= $_REQUEST['PayerID'];
$paymentType 		= 'Sale';
$currencyCodeType 	= $res['CURRENCYCODE'];

$resArray = ConfirmPayment ( $token, $payerID, $finalPaymentAmount );

$ack = strtoupper($resArray["ACK"]);
if( $ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING" )
{
	/*
	 * TODO: Proceed with desired action after the payment 
	 * (ex: start download, start streaming, Add coins to the game.. etc)
	 '********************************************************************************************************************
	 '
	 ' THE PARTNER SHOULD SAVE THE KEY TRANSACTION RELATED INFORMATION LIKE
	 '                    transactionId & orderTime
	 '  IN THEIR OWN  DATABASE
	 ' AND THE REST OF THE INFORMATION CAN BE USED TO UNDERSTAND THE STATUS OF THE PAYMENT
	 '
	 '********************************************************************************************************************
	 */
	$transactionId		= $resArray["PAYMENTINFO_0_TRANSACTIONID"]; // Unique transaction ID of the payment.
	$transactionType 	= $resArray["PAYMENTINFO_0_TRANSACTIONTYPE"]; // The type of transaction Possible values: l  cart l  express-checkout
	$paymentType		= $resArray["PAYMENTINFO_0_PAYMENTTYPE"];  // Indicates whether the payment is instant or delayed. Possible values: l  none l  echeck l  instant
	$orderTime 			= $resArray["PAYMENTINFO_0_ORDERTIME"];  // Time/date stamp of payment
	$amt				= $resArray["PAYMENTINFO_0_AMT"];  // The final amount charged, including any  taxes from your Merchant Profile.
	//$currencyCode		= $resArray["PAYMENTINFO_0_CURRENCYCODE"];  // A three-character currency code for one of the currencies listed in PayPay-Supported Transactional Currencies. Default: USD.
	$feeAmt				= $resArray["PAYMENTINFO_0_FEEAMT"];  // PayPal fee amount charged for the transaction
	//$settleAmt			= $resArray["PAYMENTINFO_0_SETTLEAMT"];  // Amount deposited in your PayPal account after a currency conversion.
	$taxAmt				= $resArray["PAYMENTINFO_0_TAXAMT"];  // Tax charged on the transaction.
	//$exchangeRate		= $resArray["PAYMENTINFO_0_EXCHANGERATE"];  // Exchange rate if a currency conversion occurred. Relevant only if your are billing in their non-primary currency. If the customer chooses to pay with a currency other than the non-primary currency, the conversion occurs in the customer's account.

	/*
	 ' Status of the payment:
	 'Completed: The payment has been completed, and the funds have been added successfully to your account balance.
	 'Pending: The payment is pending. See the PendingReason element for more information.
	 */
	$paymentStatus = $resArray["PAYMENTINFO_0_PAYMENTSTATUS"];
	/*
	 'The reason the payment is pending:
	 '  none: No pending reason
	 '  address: The payment is pending because your customer did not include a confirmed shipping address and your Payment Receiving Preferences is set such that you want to manually accept or deny each of these payments. To change your preference, go to the Preferences section of your Profile.
	 '  echeck: The payment is pending because it was made by an eCheck that has not yet cleared.
	 '  intl: The payment is pending because you hold a non-U.S. account and do not have a withdrawal mechanism. You must manually accept or deny this payment from your Account Overview.
	 '  multi-currency: You do not have a balance in the currency sent, and you do not have your Payment Receiving Preferences set to automatically convert and accept this payment. You must manually accept or deny this payment.
	 '  verify: The payment is pending because you are not yet verified. You must verify your account before you can accept this payment.
	 '  other: The payment is pending for a reason other than those listed above. For more information, contact PayPal customer service.
	 */
	$pendingReason = $resArray["PAYMENTINFO_0_PENDINGREASON"];
	/*
	 'The reason for a reversal if TransactionType is reversal:
	 '  none: No reason code
	 '  chargeback: A reversal has occurred on this transaction due to a chargeback by your customer.
	 '  guarantee: A reversal has occurred on this transaction due to your customer triggering a money-back guarantee.
	 '  buyer-complaint: A reversal has occurred on this transaction due to a complaint about the transaction from your customer.
	 '  refund: A reversal has occurred on this transaction because you have given the customer a refund.
	 '  other: A reversal has occurred on this transaction due to a reason not listed above.
	 */
	$reasonCode	= $resArray["PAYMENTINFO_0_REASONCODE"];
	// Add javascript to close Digital Goods frame. You may want to add more javascript code to
	// display some info message indicating status of purchase in the parent window

	// ------------------------------------------------------------------------------------
	// ------------------------------------------------------------------------------------
	// The following block is printed to the response stream if the payment was successful.
?>

<script>
window.onload = function(){
    if(window.opener){
         window.close();
     }
    else{
         if(top.dg.isOpen() == true){
             top.dg.closeFlow();
             return true;
          }
      }
};
</script>

<?php
	}
	else
	{
    	// Log an error with the information returned by PayPal
		$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
		$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
		$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
		$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);

		logerror("DoExpressCheckoutDetails API call failed. ");
		logerror("Detailed Error Message: " . $ErrorLongMsg);
		logerror("Short Error Message: " . $ErrorShortMsg);
		logerror("Error Code: " . $ErrorCode);
		logerror("Error Severity Code: " . $ErrorSeverityCode);

	// ------------------------------------------------------------------------------------
	// The following block is printed to the response stream if the payment failed.
?>

<script>
window.onload = function(){
    if(window.opener){
         window.close();
     }
    else{
         if(top.dg.isOpen() == true){
             top.dg.closeFlow();
             return true;
          }
      }
};
</script>

<?
    }   // closes the if block
?>

</body>
</html>
