<?php
   include_once 'config.inc.php';
    
    $email = $_POST['email'];
    include_once 'config.inc.php';
    $con = get_dbconn("");
    $query = 'select UserName from USER '
            ."where Email = '$email'";

    $result = mysql_query($query);
    $newPW = mt_rand(10,1000000000000);
    $cryptPW = crypt($newPW, $pw_salt);
    
    $query2 = "update USER set Password='$cryptPW' where Email = '$email'"; 
    $result2 = mysql_query($query2);     

        $row2 = mysql_fetch_assoc($result);
        $username = $row2['UserName'];
        $password = $newPW;
        $to = $_POST['email'];
        $from = "From: noReply@leasehood.com \r\n";
        $subject = "New Password";
        $mesg = "Thank you for using LeaseHood.com for your rental needs.\n ".
                "Here is your password and username.\n".
                "Your username is: ".$username."\n".
                "Your password is: ".$password."\n";
                
        mail($to, $subject, $mesg, $from);
        
?>



<?php
session_start();

$title = "Password Reset";
    include 'Header.php';
    
    
    
    
    
    
        
?>

<h1 class="Title">Forgot Password</h1>
        <hr class="Title" />
        <h2 class="Title">An email has been sent to your account.</h2>
        
<?php
    include 'Footer.php';
?>
