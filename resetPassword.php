<?php
    /**
     * Reset password page
     */
        $title = "LeaseHood";
	include 'Header.php';
        include_once 'config.inc.php';
        
?>

<!-- PAGE CONTENT -->

        <h1 class="Title">Welcome to LeaseHood</h1>
        <hr class="Title" />
        <h2 class="Title">"Putting the Best Residents in Rental Homes"</h2>

        <div id="mainContent">
           <?php
                echo '<form method="post" action="index.php">';
                echo '<table>';
                echo '<tr><td>Userid:</td>';
                echo '<td><input type="text" name="userid"></td></tr>';
                echo '<tr><td>Password:</td>';
                echo '<td><input type="password" name="password"></td></tr>';
                echo '<tr><td colspan="2" align="center">';
                echo '<input type="submit" value="Log in"></td></tr>';
                echo '</table></form>';
           ?>
            
            
            
       </div>
        
<?php


        
	include 'Footer.php';
?>