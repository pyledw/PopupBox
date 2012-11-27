<?php
    /**
     * Reset password page
     */
        $title = "LeaseHood";
	include 'Header.php';
        include_once 'config.inc.php';
        
?>

<!-- PAGE CONTENT -->

        <h1 class="Title">Forgot Password</h1>
        <hr class="Title" />
        <h2 class="Title">Please enter in your email address. An email will be sent with your username and password.</h2>

        <div id="mainContent">
           <?php
                echo '<form method="post" action="resetPasswordRedirect.php">';
                echo '<table>';
                echo '<tr><td>Email:</td>';
                echo '<td><input type="text" name="email"></td></tr>';
                echo '<tr><td colspan="2" align="center">';
                echo '<input type="submit" value="Send"></td></tr>';
                echo '</table></form>';
           ?>
            
            
            
       </div>
        
<?php


        
	include 'Footer.php';
?>