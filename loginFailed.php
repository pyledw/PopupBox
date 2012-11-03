
<?php
        $title = "Login Failed";
	include 'Header.php';
        
        
        if(isset($_SESSION['user'])){
            header( 'Location: /myHood.php' ) ;
        }
        

        

?>
<div id="wrapper">
    <div id="mainContent">
        <form class="formStyle" width="" height="" method="post" action="loginRedirect.php">
            <p class="redTextArea">Wrong Username or Password.  Please try again</p>
            Username:<input id="userName" type="text" name="userName">
            Password:<input type="password" name="password">
            <br/>
            Remember Me: <input type="checkbox" name="rememberMe">
            <br/>
            <button id="submit" type="submit" class="button">Save and Continue</button>
            <button type="reset" class="button">Clear</button>

        </form>
    </div>
</div>
<?php

	include 'Footer.php';

?>

