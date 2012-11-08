<?php
    session_start();
    session_destroy();
    setcookie('userID', "", time()-3600);
    setcookie('user', "", time()-3600);
    setcookie('type', "", time()-3600);
    header( 'Location: /index.php' );
?>
