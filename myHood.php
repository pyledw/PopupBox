
<?php
        $title = "MyHood";
	include 'Header.php';

?>

<!-- Page Content -->
<h1 class="Title">Login</h1>
    <hr class="Title" />
<div id="mainContent">
<?php

include "formElements.php";
createForm("300px", "300px", "Login", "login.php");
createPasswordField("password", "Password: ");
createTextField("username", "Username", "Username: ", "");
createButton("submit", "continue", "button");
echo '</form>';
?>
    
</div>

<?php
	include 'Footer.php';
?>