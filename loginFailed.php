
<?php
        $title = "Login Required";
	include 'Header.php';
        
        if(isset($_SESSION['user'])){
            header( 'Location: /myHood.php' ) ;
        }
        
        
        if(isset($_GET[errorDisplay]))
        {
            $errorDisplay = $_GET[errorDisplay];
        }
        else
        {
            $errorDisplay = "Login is required";
        }
        
        

        

?>
<div id="wrapper">
    <form id="newApplicationForm" method="post" action="loginRedirect.php">
            <table width="350px" class="tableForm" style="margin-top: -5px;">
                <tr>
                    <td>
                       <font color="red"><b><?php echo $errorDisplay; ?></b></font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <lable class="label">Username:</label><br/><input title="Username" class="required" id="userName" type="text" name="userName">
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
            </table>

        </form>
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