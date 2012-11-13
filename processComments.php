<?php

        $title = "Comments Submitted";
	include 'Header.php';
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $comments = $_POST['comments'];
        //$user = $_SESSION['userID'];
?>

<h1 class="Title">Comments Submitted</h1>
    <hr class="Title" />
    <div id="mainContent">
        <?php
            //check to see if email is vaild
        function spamcheck($field)
        {
            //first, sanitize the email
            $field = filter_var($field, FILTER_SANITIZE_EMAIL);
            
            //2nd, validate email
            if(filter_var($field, FILTER_VALIDATE_EMAIL))
            {
                return TRUE;
            }        
           else
            {
               return FALSE;
            }
         }
         //testing the email. If mailcheck is true, sends mail out
         $mailcheck = spamcheck($email);
         if($mailcheck == FALSE)
         {
             echo "The email you entered was not valid. ".
                     "Click <a href='support.php'>here</a> to enter your email again.";
         }
         else
         {
            $subject = "Feedback/Comments from Leasehood";
            $mailcontent = "Name of person is: ".$fname." ".$lname."\n".
                    "Their email is: ".$email."\n".
                    "Their question/concern is: \n".$comments."\n";
            $from = "info@leasehood.com";
            $to = "longas@mail.lipscomb.edu";
            echo $subject."<br />".$mailcontent."<br />".$from."<br />".$to;
            //mail($to, $subject, $mailcontent, $from);
            //echo "<p>Thank you for your feedback. You will receive a reply from our support staff between 1-3 business days.</p>";
         }
        ?>
        
    </div>
<?php
    include 'Footer.php';
?>
