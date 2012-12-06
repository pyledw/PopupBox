<!-- This page manages the accounts settings and passwords and emails -->


<?php
    /**
     * This page contains the options from the user's settings.
     * 
     * This page will allow the user to change their settings.
     * This includes password, and email.
     * It will also allow them to chage their notification level, 
     * and auto sign in.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
        $title = "MyHood - Account";
	include 'Header.php';
?>

<!-- Page Content -->
<h1 class="Title">Login</h1>
    <hr class="Title" />
<div id="mainContent">
<form id="newApplicationForm"  method="post" action="updateAccount.php"> 
    <table width="750px" class="tableForm" style="text-align: center;">
        <font class="formheader">Account Information</font>
        <?php if(isset($_GET['error'])){echo '<tr><td><font color="red">'.$_GET['error'].'</font></td></tr>';} ?>
        <?php if(isset($_GET['message'])){echo '<tr><td><font color="green">'.$_GET['message'].'</font></td></tr>';} ?>
        <tr>
            <td>
                <h3>Change my password</h3>
            </td>
        </tr>
        <tr>
            <td>
                <label class="label">Enter old Password:</label><br/><input type="password" name="currentPassword" /><br/>
                <label class="label">Enter New Password:</label><br/><input type="password" name="newPassword1" /><br/>
                <label class="label">Confirm New Password:</label><br/><input type="password" name="newPassword2" />
            </td>
        </tr>
        <tr>
            <td>
                <h3>Change my email address</h3>
            </td>
        </tr>
        <tr>
            <td>
                <label class="label">Enter old Email:</label><br/><input type="text" name="currentEmail" /><br/>
                <label class="label">Enter New Email:</label><br/><input type="text" name="newEmail1" /><br/>
                <label class="label">Confirm New Email:</label><br/><input type="text" name="newEmail2" />
            </td>
        </tr>
        <tr>
            <td>
                <button class="button" type="submit">Save Changes</button><br/>
                <a href="cancelAccount.php">Cancel my account</a><br/>
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
        ignoreTitle: true
        
    });
  });
</script>
