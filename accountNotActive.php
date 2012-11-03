<!--  This page is for if the user account is not active. It will display if the user account has been
      suspended by the administrator                               -->


<?php
        $title = "Login - Not Active";
	include 'Header.php';
        if(isset($_SESSION['user'])){
            header( 'Location: /myHood.php' ) ;
        }
        

        

?>
<div id="wrapper">
    <p>We apologize, but it seems as though your account is not active.  Please give us some time to review your account, and if
       you have any questions, please email us at admin@leasehood.com</p>
    <form class="formStyle" width="" height="" method="post" action="loginRedirect.php">
        Username:<input id="userName" type="text" name="userName">
        Password:<input type="password" name="password">
        <br/>
        Remember Me: <input type="checkbox" name="rememberMe">
        <br/>
        <button id="submit" type="submit" class="button">Save and Continue</button>
        <button type="reset" class="button">Clear</button>
    
    </form>
</div>
<?php

	include 'Footer.php';

?>

