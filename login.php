
<?php
        /**
         * This page is the login page for the user.
         * 
         * It first checks to see if the user is currently logged in or not. 
         * It then retireves and arror message that might have been sent to it.
         * It will then send the data of the user to the login redirect.
         * It utilizes Jquery for validation to ensure information is entered.
         * 
         * @author David Pyle <Pyledw@Gmail.com>
         *  
         */
        session_start();
        //Checks to see if the user is already logged in, and rerouts them acordingly
        if(isset($_SESSION['type']))
        {
            echo "TYPE IS SET";
            header( 'Location: /myHood.php' );
        }
        if(isset($_GET[error]))
        {
            $errorMessage = $_GET[error];
        }
        else
        {
            $errorMessage = "";
        }
        
        $title = "Login";
	include 'Header.php';
        
        
        
        

        

?>



<div id="wrapper">
    <div id="mainContent">
        <form id="newApplicationForm" method="post" action="loginRedirect.php">
            <table width="350px" class="tableForm">
                <?php if($errorMessage != ""){echo '<tr><td><font color="red">'.$errorMessage.'</font></td></tr>';} ?>
                <tr>
                    <td>
                        <lable class="label">Username</label><br/><input title="Username" class="required" id="userName" type="text" name="userName">
                    </td>
                </tr>
                <tr>
                    <td>
                       <lable class="label">Password:</label><br/><input title="Password" class="required" type="password" name="password">
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
                <?php if($errorMessage != ""){echo '<tr><td><font color="red">Forgot password? <a href="resetPassword.php">Reset</a></font></td></tr>';} ?>
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
        ignoreTitle: true,
        onkeyup: false,
        onclick: false
        
    });
  });
</script>

