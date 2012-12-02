<?php
    $applicationID = $_GET['applicationID'];
    echo $applicationID;
    include_once 'config.inc.php';
    
    get_dbconn("");
    
    $result = mysql_query("UPDATE APPLICATION
        SET PageCompleted='1'
        WHERE ApplicationID='$applicationID'");
    if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
    
    header( 'Location: /myHood.php' );
?>
