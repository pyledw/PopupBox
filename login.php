
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
        <form method="post" action="loginRedirect.php">
            <table class="form">
                <tr>
                    <td>
                        Username:<input id="userName" type="text" name="userName">
                    </td>
                </tr>
                <tr>
                    <td>
                        Password:<input type="password" name="password">
                    </td>
                </tr>
                <tr>
                    <td>
                        Remember Me: <input type="checkbox" name="rememberMe">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button id="submit" type="submit" class="button">Save and Continue</button>
                        <button type="reset" class="button">Clear</button>
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>
<?php

	include 'Footer.php';

?>

