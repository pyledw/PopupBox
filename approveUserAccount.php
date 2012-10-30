<!-- This was for allowing the administrator to approve an account.  Not nessicary anymore -->
<?php

echo "redirect";
echo $_POST[accountID];

require_once "config.inc.php";
        //SQL connection information

        $con = get_dbconn("");
        
        mysql_query("UPDATE USER SET IsApproved='Y'
        WHERE UserID = '$_POST[accountID]'");
        
        header( 'Location: /myHood.php' );
        
?>
