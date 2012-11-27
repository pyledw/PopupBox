<?php


/**
 * This page is used if the user is selecting to change a users account.
 * If the type of change is 0 it will disable the account.  if 1 it will enable the account.
 * 
 * @author David Pyle <Pyledw@Gmail.com>
 */
echo "redirect";
echo $_GET[userID];

    if($_GET[type] == "0")
        {
            require_once "config.inc.php";
            //Connecting to the sql database
            $con = get_dbconn("");

            $result = mysql_query("UPDATE USER SET IsSuspended='1'
            WHERE UserID = '$_GET[userID]'");

            if(!$result)
            {
                die('could not connect: ' .mysql_error());
            }
        }
    elseif($_GET[type] == "1") 
        {
            require_once "config.inc.php";
            //Connecting to the sql database
            $con = get_dbconn("");

            $result = mysql_query("UPDATE USER SET IsSuspended='0'
            WHERE UserID = '$_GET[userID]'");

            if(!$result)
            {
                die('could not connect: ' .mysql_error());
            }
        }
    elseif($_GET[type] == "2") 
        {
            require_once "config.inc.php";
            //Connecting to the sql database
            $con = get_dbconn("");

            $result = mysql_query("UPDATE USER SET AccountType='3'
            WHERE UserID = '$_GET[userID]'");

            if(!$result)
            {
                die('could not connect: ' .mysql_error());
            }
        }
     
        
        header( 'Location: /myHood.php' );
?>
