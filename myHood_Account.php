
<?php
        $title = "MyHood - Home";
	include 'Header.php';
?>

<!-- Page Content -->
<h1 class="Title">Login</h1>
    <hr class="Title" />
<div id="mainContent">
<form class="formStyle"  method="post" action="updateAccount.php">    
    Auto sign in <input type="checkbox" name="autoSignIn" value="1"><br/>


    Would like messages from LeaseHood about specials? <input type="checkbox" name="personalEmail" value="1"><br/>


    <h3>Change my password</h3>
    Enter old Password<input type="text" name="currentPassword" /><br/>
    Enter New Password<input type="text" name="newPassword1" />
    Confirm New Password<input type="text" name="newPassword2" />

    <br/>

        <h3>Change my email address</h3>
    Enter old Email<input type="text" name="currentEmail" /><br/>
    Enter New Email<input type="text" name="newEmail1" />
    Confirm New Email<input type="text" name="newEmail2" />
    <br/>
    <br/>
    <button class="button" type="submit">Save Changes</button><br/>
    <a href="cancelAccount.php">Cancel my account</a><br/>
</form>

    
</div>

<?php
	include 'Footer.php';
?>