<?php
    /**
     * This page updates the listing after the user has paid the fee.
     */
include_once 'config.inc.php';
require_once ("feeprocessing.inc.php");
$res = FeeProcessing::complete_paypal($_REQUEST['token'], $_REQUEST['PayerID']);

if($res)
{
    FeeProcessing::set_property_ispaid($_REQUEST['token']);
    header( 'Location: /myHood.php' );

}
else
{
}
?>
