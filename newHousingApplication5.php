<?php
    $title = "Housing Application Part 5";
    include 'Header.php';
    
    
    if(!isset($_SESSION[userID]))
    {
        header( 'Location: /loginRequired.php' ) ;
    }
    
    
    
?>
<div id="mainContent">
<form id="newApplicationForm" method="post" action="newHousingApplication5Redirect.php">
    <table class="tableForm" style="text-align: center;">
        <font class="formheader">Terms and Conditions</font>
        <tr>
            <td>
             Your application is now complete.  It will be submitted for verification  
    once you certify and click "Continue" below and after your $6 application 
    fee has been processed.  Please thoroughly review the terms and conditions
    below and continue with your application.  After submission, you will 
    notified within approximately two (2) business days as to the status of 
    your application with LeaseHood.com, confirming your status to submit a 
    Proposal for Occupancy.  Until such time you will have provisional 
    capabilities.  Your application will be valid for 90 days after verified,
    allowing you to submit multiple PFOs at separate times (you will not be able
    to submit multiple PFOs simultaneously) without additional application fees.
            </td>
        </tr>
        <tr>
            <td>
                <a href="#">TERMS AND CONDITIONS</a>
            </td>
        </tr>
        <tr>
            <td>
                <label class="label">Email verification</label><br/><input class="required email" type="text" name="email"/>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" class="button">Save and Continue</button>
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
        ignoreTitle: true
        
    });
  });
</script>
