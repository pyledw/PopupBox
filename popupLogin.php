<?php
    session_start();
    session_destroy();
    session_start();
?>
<link rel="stylesheet" type="text/css" href="css/popupStyles.css" />
<div id="popupContent" style="width:400px;">
<h1 class="popupHeader">Login Please</h1>

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