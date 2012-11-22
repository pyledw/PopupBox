<?php
    /**
     * This page allow the user to pay thier listing fee
     */
        $title = "Contact LeaseHood";
	include 'Header.php';
        $propertyID = $_GET[propertyID];
        if(isset($_SESSION['propertyID']))
        {
            $propertyID = $_SESSION['propertyID'];
        }
        
    include_once 'config.inc.php';
    $con = get_dbconn("");

    //Query to select the user's application using their userID number
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
?>



    <h1 class="Title">Pay for Listing</h1>
    <hr class="Title" />
    <div id="mainContent">
        PAY LISTING FEE HERE<br/><br/>
        
 <!--       Form
        
        <form action="payListingFeeRedirect.php" method="post">
            <input type="text" name="propertyID" value="<?= $propertyID ?>" style="display: none;" />
        <table class="tableForm" border="0" >
            <tr>
                <td>First Name: </td>
                <td><input type="text" name="fname" size="15" maxlength="25"/></td>
            </tr>
            <tr>
                <td>SUCCESS/FAILURE</td>
                <td><input type="text" name="result" size="15" maxlength="25"/></td>
            </tr>
            <tr>
                <td><input type="submit"  value="Pay" class="button" />
            </tr>
        </table>
        </form>
    </div>
    -->

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
                 //PayPal will decide the experience type for the buyer based on his/her 'Remember me on your computer' option.
        });

</script>

<?
        include 'Footer.php';
?>
