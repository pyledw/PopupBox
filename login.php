
<?php
        $title = "Login";
	include 'Header.php';
        if(isset($_SESSION['user']))
        {
            header( 'Location: /myHood.php' ) ;
        }
        

        

?>
<div id="wrapper">
    <div id="mainContent">
        <form class="login" method="post" action="loginRedirect.php">
            Username:<input id="userName" type="text" name="userName"><br/>
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

