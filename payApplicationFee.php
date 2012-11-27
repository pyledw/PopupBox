<?
    /**
     * This page is to allow the user to pay their application fee
     */

    include_once 'config.inc.php';

	session_start();
    $userID = $_SESSION['userID'];

    $con = get_dbconn("");
    $result = mysql_query("SELECT * FROM APPLICATION WHERE UserID ='$userID'");

    if(!$result)
    {
        die('could not connect: ' .mysql_error());
    }
    $row = mysql_fetch_array($result);

    if($row['IsPaid'] == 1)
    {
        header( 'Location: /myHood.php' );
    }

	$_SESSION['fee-type'] = 'application';
	$_SESSION['applicationID'] = $row['ApplicationID'];

	$title = "Pay Application";
    include 'Header.php';		// needs to come after Location redirects
?>

    <h1 class="Title">Pay for Application</h1>
    <hr class="Title" />
    <div id="mainContent">
        PAY APPLICATION FEE HERE<br/><br/>

		<form action='checkout.php' METHOD='POST'>
			<input type='image' name='paypal_submit' id='paypal_submit'
							src='https://www.paypal.com/en_US/i/btn/btn_dg_pay_w_paypal.gif' border='0' align='top' alt='Pay with PayPal' />
		</form>
	</div>

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
