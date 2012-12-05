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
    
    $userid = $_SESSION['userID'];
    $result1 = mysql_query("update USER set IsSuspended='1' where UserID = '$userid'");
    
    
    
    
    
?>

<h1 class="Title">Tips for Success - Landlords</h1>
<hr class="Title" />
<div id="mainContent">
    
</div>

<?php
	include 'Footer.php';
?>