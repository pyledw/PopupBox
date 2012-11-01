
<?php
        $title = "MyHood - Home";
	include 'Header.php';
?>

<!-- Page Content -->
<h1 class="Title">Login</h1>
    <hr class="Title" />
<div id="mainContent">
<form id="newApplicationForm"  method="post" action="updateAccount.php"> 
    <table width="750px" class="form" style="text-align: center;">
        <font class="formheader">Account Information</font>
        <tr>
            <td>
                 Auto sign in <input type="checkbox" name="autoSignIn" value="1">
            </td>
        </tr>
        <tr>
            <td>
                Would like messages from LeaseHood about specials? <input type="checkbox" name="personalEmail" value="1">
            </td>
        </tr>
        <tr>
            <td>
                <h3>Change my password</h3>
            </td>
        </tr>
        <tr>
            <td>
                Enter old Password<input type="text" name="currentPassword" /><br/>
                Enter New Password<input type="text" name="newPassword1" /><br/>
                Confirm New Password<input type="text" name="newPassword2" />
            </td>
        </tr>
        <tr>
            <td>
                <h3>Change my email address</h3>
            </td>
        </tr>
        <tr>
            <td>
                Enter old Email<input type="text" name="currentEmail" /><br/>
                Enter New Email<input type="text" name="newEmail1" /><br/>
                Confirm New Email<input type="text" name="newEmail2" />
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

   $(function(){
         $.fn.formLabels();
   });
</script>
