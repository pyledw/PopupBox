<html>
<body>

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

 </body>
</html>
