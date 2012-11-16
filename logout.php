<?php
    /**
     * This page is for if the user selects to log out.
     * 
     * It will destroy all variables used for keeping any login
     * credentials.  It then rerouts the user back to the home page.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    
    session_start();
    session_destroy();
    setcookie('userID', "", time()-3600);
    setcookie('user', "", time()-3600);
    setcookie('type', "", time()-3600);
    header( 'Location: /index.php' );
?>
