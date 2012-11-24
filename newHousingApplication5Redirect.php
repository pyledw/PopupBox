<?php

    /** 
     * This redirect will get all of the inforamiton from the previus page in a form post.
     * It will check the database to see if an applicaiton is already on file.
     * It will then insert the new applicaiton info into the APPLICATION table or Update
     * the previus info acordingly.
     * 
     * It finaly checks to see if the user application was completed, and if it was not
     * it will update the pagecompleted field to the correct page.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */

session_start();

    include_once 'config.inc.php';
        //Connecting to the sql database
    
    //Using the new method for inserting into the Database
    $con = get_dbconn("PDO");
    $stmt = $con->prepare("
            UPDATE APPLICATION SET
                ESignature=:email
                
            WHERE UserID='$_SESSION[userID]'
            ");
    try {
        $stmt->bindValue(':email',              $_POST['email'],             PDO::PARAM_STR);


        $stmt->execute();
    } catch (Exception $e) {
	echo 'Connection failed. ' . $e->getMessage();
    }
    
    $con = get_dbconn(""); 
    //Query to retrieve the application of the user
    $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='$_SESSION[userID]'");
    
    //Casting the query results on to $row
    $row = mysql_fetch_array($result);
    
    //Setting which page has been completed.  If the form has already been completed it ignores this
    if($row[PageCompleted] != "6")
    {
        
        mysql_query("UPDATE APPLICATION SET PageCompleted='6'
        WHERE UserID = '$_SESSION[userID]'");
    }
    //sending email
        $to = $_POST['email'];
        $from = "From: noReply@leasehood.com \r\n";
        $subject = "Thank you for your Application";
        $mesg = "Dear lessee,\n"."Thank you for using LeaseHood.com for your rental needs.  Your LeaseHood application has been submitted.".
                "You will notified within approximately two (2) business days as to the status of your application with LeaseHood.com,".
                "confirming your status to submit a Proposal for Occupancy.  Until such time you will have provisional capabilities. " .
                "Thank you again for joining LeaseHood and we hope your experience with us is a positive one.  Should you have any questions, please email us at info@LeaseHood.com.\n".
                "Regards,\n Mark Gardner\n President|CEO";
        mail($to, $subject, $mesg, $from);
    
    mysql_close();
    
    header( 'Location: /payApplicationFee.php' );
    
?>
