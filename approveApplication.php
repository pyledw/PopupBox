
<?php

/**
 * This form will simply take the application ID and change the value of the coresponding
 * IsApproved feild to 1.  This will allow us to know that the application was approved
 * This proccess accurs after the administrator has clicked the approve button on the application
 * 
 * @author David Pyle <Pyledw@Gmail.com>
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
        
        //email for bidder
        //set the query to get the email address from ApplicationID 
        $query0 = mysql_query("select UserID from APPLICATION where ApplicationID = '$_POST[ApplicationID]'");
        $row0 = mysql_fetch_assoc($query0);
        $userid = $row0['UserID'];
        
        $query1 = mysql_query("select Email from USER where UserID = '$userid'");
        $row1 = mysql_fetch_assoc($query1);
        $username = $row1['Email'];
        
        
        //compile and send the email
        $to = $username;
        $from = "From: noReply@leasehood.com \r\n";
        $subject = "Application Approval";
        $mesg = "Dear lessee,\n ".
            "Congratulations.  Your application has been approved! ".
            "To help make your experience with LeaseHood more enjoyable and successful, please note the following tips: \n<table>".
            "<tr><td>*Some landlords require a monthly income of 4 times the monthly rental rate.\n</td></tr>".
            "<tr><td>*Consider saving several homes and searches.  By doing so, you can automatically be emailed important messages about the properties. \n</td></tr>".
            "<tr><td>*Please note that the Proposal for Occupancy (PFO) is package that consists of your proposed rental rate and the information 
                in your application.  It is very important that your application contains accurate information since it will likely 
                be verified by the landlord before the lease agreement is presented to you for approval. \n</td></tr>".
            "<tr><td>*After you submit a PFO, you can change the proposed rental rate at any time or mae changes to your application. \n</td></tr>".
            "<tr><td>*Only one PFO can be submitted at a time.</td></tr>".
            "<tr><td>*If your PFO is not selected, you may then submit a PFO for another property free 
                of charge for 30 days.\n</td></tr>".
            "Should you have any questions, please email us at info@LeaseHood.com.\n</table>".
            "Regards,\nMark Gardner\nPresident|CEO";
                
         mail($to, $subject, $mesg, $from);
        
?>
