
<?php
        $title = "Login";
	include 'Header.php';
        if(isset($_SESSION['user'])){
            header( 'Location: /myHood.php' ) ;
        }
        

        

?>
<div id="wrapper">
    <form class="formStyle" width="" height="" method="post" action="loginRedirect.php">
        <p class="redTextArea">You must be logged in to view this content</p>
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

