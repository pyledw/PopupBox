
<?php
        $title = "Login";
	include 'Header.php';
	
?>
<div id="wrapper">
    <form class="formStyle" width="90%" height="90%" method="post" action="myHood.php">
        Username:<input type="text" name="userName">
        Password:<input type="password" name="Password">
        <select name="userType">
            <option name="1">1</option>
            <option name="2">2</option>
            <option name="3">3</option>
        </select>
        <br/>
        <button type="submit" class="button">Save and Continue</button>
        <button type="reset" class="button">Clear</button>
    
    </form>
</div>
<?php

	include 'Footer.php';

?>
