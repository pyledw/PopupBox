<?php
session_start();

    include_once 'config.inc.php';
    
    $email = $_POST['email'];
    include_once 'config.inc.php';
    $con = get_dbconn("");
    $query = 'select UserName from USER '
            ."where Email = '$email'";

    $result = mysql_query($query);
    $newPW = rand(10,30);
    
    $query2 = "update USER set Password='$newPW' where Email = '$email'"; 
    $result2 = mysql_query($query2);
    
    
    
    
    
        $username = $result;
        $password = $newPW;
        $to = $_POST['email'];
        $from = "From: noReply@leasehood.com \r\n";
        $subject = "New Password";
        $mesg = "Thank you for using LeaseHood.com for your rental needs.\n ".
                "Here is your password and username.\n".
                "Your username is: ".$username."\n".
                "Your password is: ".$password."\n".
                
        mail($to, $subject, $mesg, $from);
?>
<h1 class="Title">Forgot Password</h1>
        <hr class="Title" />
        <h2 class="Title">An email has been sent to your account.</h2>