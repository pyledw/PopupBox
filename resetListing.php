<?php
include_once 'config.inc.php';
get_dbconn("");
$result = mysql_query("UPDATE PROPERTY
    SET PageCompleted='1'
    WHERE PropertyID='".$_GET['propertyID']."'");
if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
echo $_GET['propertyID'];
header( 'Location: /myHood.php' );  
?>
