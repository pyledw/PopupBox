
<?php
        session_start();
        echo $_SESSION['user'];
        //Checks to see if the user is already logged in, and rerouts them acordingly
        if(isset($_SESSION['type']))
        {
            echo "TYPE IS SET";
            header( 'Location: /myHood.php' );
        }
        
        $title = "Login";
	include 'Header.php';
        
        
        
        

        

?>



<div id="wrapper">
    <div id="mainContent">
        <form id="newApplicationForm" method="post" action="loginRedirect.php">
            <table width="350px" class="tableForm">
                <tr>
                    <td>
                        <lable>Username:</label><input title="Username" class="required" id="userName" type="text" name="userName">
                    </td>
                </tr>
                <tr>
                    <td>
                       <lable>Password:</label> <input title="Password" class="required" type="password" name="password">
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

<script>
$(document).ready(function(){
    $("#newApplicationForm").validate({
        ignoreTitle: true
        
    });
  });
</script>

