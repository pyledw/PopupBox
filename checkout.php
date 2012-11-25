<?php
session_start();

require_once ("config.inc.php");
require_once ("paypal.inc.php");
require_once ("log.inc.php");
require_once ("feeprocessing.inc.php");

$feeType = $_SESSION['fee-type'];

if(!isset($feeType))
{
	header('Location: myHood.php');
}

$fee = $cfg_fees[$feeType];
logdebug('Fee is: ' . print_r($fee, true));

//
// this may redirect to paypal.  if it doesn't, something went wrong.  oops
//
if ($feeType == 'listing')
{
	$res = FeeProcessing::begin_paypal_for_listing_fee($_SESSION['userID'], $_SESSION['propertyID'], $fee);
}
else if ($feeType == 'application')
{
	$res = FeeProcessing::begin_paypal_for_application_fee($_SESSION['userID'], $_SESSION['applicationID'] , $fee);
}
// if we get here, $res should almost certainly be false
if ($res)
{
	// do nothing, its good
}
else 
{
	// what should we do?  we've already logged the error
}
?>
