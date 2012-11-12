<?php

        $title = "Comments Submmitted";
	include 'Header.php';
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $comments = $_POST['comments'];
?>

<h1 class="Title">Comments Submitted</h1>
    <hr class="Title" />
    <div id="mainContent">
        <p>Thank you for your feedback. You will receive a reply from our support staff between 1-3 business days.</p>
        
    </div>

<?php
?>
    
<?php
    include 'Footer.php';
?>
