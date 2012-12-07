<?php
        $title = "Tips For Success - Landlords";
	include 'Header.php';
        
        session_start();
        require_once 'config.inc.php';
        include_once 'log.inc.php';
        $con = get_dbconn("");
        
        if(!isset($_SESSION['userID']))
    {
		loginfo('No user id on session.  Going back to loginRequired.');
        header( 'Location: /loginRequired.php' ) ;
    }
    
    //sending email to account cancellation
    $userid = $_SESSION['userID'];
    $result1 = mysql_query("update USER set IsSuspended='1' where UserID = '$userid'");
    $result2 = mysql_query("select Email from USER where UserID = '$userid'");
    $email = mysql_fetch_assoc($result2);
    
    
    
    //sending email to account owner
        $to = $email;
        $from = "From: noReply@leasehood.com \r\n";
        $subject = "Account Cancellation";
        $mesg = "Dear user,\n"."Thank you for using LeaseHood.com for your rental needs.  We hope you had a pleasant experience. ".
                "We hereby notifiy you that your account has been suspended. Your account data will not be deleted, however, per legal reasons, it would be stored in our database.".
                "We will keep your data for a period of time securely in our database. Should you want to reactivate your account, please send an email to info@Leasehood.com.  " .
                "Should you have any questions, please email us at info@LeaseHood.com.\n".
                "Regards,\n Mark Gardner\n President|CEO";
        mail($to, $subject, $mesg, $from);
    
    
    
    
?>

<h1 class="Title">Tips for Success - Landlords</h1>
<hr class="Title" />
<div id="mainContent">
    <p>Your account has been suspended. You will not be able to log back into Leasehood.com. Your data is will not be deleted,
        however, it will be safely secure in our database.  Should you want to reactivate your account, you can email us at info@Leasehood.com. 
        We thank you for using us for your rental needs.</p>
</div>

<?php
	include 'Footer.php';
?>