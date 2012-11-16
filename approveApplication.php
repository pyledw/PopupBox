
<?php

/**
 * This form will simply take the application ID and change the value of the coresponding
 * IsApproved feild to 1.  This will allow us to know that the applicaiton was approved
 * This proccess accurs after the administrator has clicked the approve button on the applicaiton
 * 
 */
echo "redirect";
echo $_POST[ApplicationID];

        require_once "config.inc.php";
        //Connecting to the sql database
        $con = get_dbconn("");
        
        /** Updating the field in the database */
        $result = mysql_query("UPDATE APPLICATION SET IsApproved='1'
        WHERE ApplicationID = '$_POST[ApplicationID]'");

        
        header( 'Location: /myHood.php' );
        
?>
