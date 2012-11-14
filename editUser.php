<?php

echo "redirect";
echo $_GET[userID];

    if($_GET[type] == "0")
        {
            require_once "config.inc.php";
            //Connecting to the sql database
            $con = get_dbconn("");

            $result = mysql_query("UPDATE USER SET IsApproved='0'
            WHERE UserID = '$_GET[userID]'");

            if(!$result)
            {
                die('could not connect: ' .mysql_error());
            }
        }
    else 
        {
            require_once "config.inc.php";
            //Connecting to the sql database
            $con = get_dbconn("");

            $result = mysql_query("UPDATE USER SET IsApproved='1'
            WHERE UserID = '$_GET[userID]'");

            if(!$result)
            {
                die('could not connect: ' .mysql_error());
            }
        }
        
        header( 'Location: /myHood.php' );
?>
