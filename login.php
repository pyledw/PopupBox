
<?php
        $title = "Login";
	include 'Header.php';
        if(isset($_SESSION['user'])){
            header( 'Location: /myHood.php' ) ;
        }
        

        

?>
<div id="wrapper">
    <form class="formStyle" width="" height="" method="post" action="loginRedirect.php">
        Username:<input id="userName" type="text" name="userName">
        Password:<input type="password" name="password">
        1.Tenant - 2.Landlord - 3.Administrator
        <select id="select" name="userType">
            <option name="1">1</option>
            <option name="2">2</option>
            <option name="3">3</option>
        </select>
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

