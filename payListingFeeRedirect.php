<html>
<body>

<?php
    /**
     * This page updates the listing after the user has paid the fee.  It then closes the paypal popup window
	 * and redirects the main window to myHood.
     */
include_once 'config.inc.php';
require_once ("feeprocessing.inc.php");
$res = FeeProcessing::complete_paypal($_REQUEST['token'], $_REQUEST['PayerID']);

if($res)
{
	// Payment was successfully completed!  Hooray!  Set the property ispaid flag now:
    FeeProcessing::set_property_ispaid($_REQUEST['token']);

	// now close this popup window and redirect the main window back to myHood
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
}
else
{
	// what's what?  payment failed?  boooooooooo

}
?>

</body>
</html>
