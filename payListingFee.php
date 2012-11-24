<?
    /**
     * This page allows the user to pay the fee to list their property.
     */
	include_once 'config.inc.php';
	include_once 'log.inc.php';

	session_start();
    $propertyID = $_GET['propertyID'];
    if(isset($_SESSION['propertyID']))
    {
        $propertyID = $_SESSION['propertyID'];
    }

    if(!isset($propertyID))
    {
		loginfo('No property id on session or GET variable?  going back to myHood');
        header('Location: /myHood.php');
    }

    $con = get_dbconn("");
    $result = mysql_query("SELECT IsPaid FROM PROPERTY WHERE PropertyID ='$propertyID'");

    if(!$result)
    {
        die('could not connect: ' .mysql_error());
    }
    $row = mysql_fetch_array($result);
    if($row[IsPaid] == 1)
    {
	// The fee is already paid, so go back to myHood.
        header( 'Location: /myHood.php' );
    }

    $_SESSION['fee-type'] = 'listing';
	
	$title = "Contact LeaseHood";
    include 'Header.php';		// this should come after all Location redirects
?>
    <h1 class="Title">Pay for Listing</h1>
    <hr class="Title" />
    <div id="mainContent">
        PAY LISTING FEE HERE<br/><br/>

<form action='checkout.php' METHOD='POST'>
        <input type='image' name='paypal_submit' id='paypal_submit'
                src='https://www.paypal.com/en_US/i/btn/btn_dg_pay_w_paypal.gif' border='0' align='top' alt='Pay with PayPal' />
</form>


<script src='https://www.paypalobjects.com/js/external/dg.js' type='text/javascript'></script>


<script>

        var dg = new PAYPAL.apps.DGFlow(
        {
                trigger: 'paypal_submit',
                expType: 'instant'
        });
</script>

<?
    include 'Footer.php';
?>
