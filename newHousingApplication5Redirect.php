<?php

    /** 
     * This redirect will get all of the inforamiton from the previus page in a form post.
     * It will check the database to see if an application is already on file.
     * It will then insert the new application info into the APPLICATION table or Update
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
                "Once your fee has been processed, you will be notified within approximately two (2) business days as to the status of your application with LeaseHood.com,".
                "confirming your status to submit a Proposal for Occupancy.  Until such time you will have provisional capabilities. " .
                "Thank you again for joining LeaseHood and we hope your experience with us is a positive one.  Should you have any questions, please email us at info@LeaseHood.com.\n".
                "Regards,\n Mark Gardner\n President|CEO";
        mail($to, $subject, $mesg, $from);
        
        
    //sending email to admin 
        //get applicant name from user table
        $result2 = mysql_query("select * from USER where UserID = '$_SESSION[userid]'");
        $row2 = mysql_fetch_array($result2);
        $username = $row2['UserName'];
        $firstName = $row2['FirstName'];
        $lastName = $row2['LastName'];
        $address = $row2['Address'];
        $zip = $row2['Zip'];
        $city = $row2['City'];
        $state = $row2['State'];
        
        //get stuff from application table
        $result3 = mysql_query("select * from APPLICATION where UserID = '$_SESSION[userid]'");
        $row3 = mysql_fetch_array($result3);
        $appID = $row3['ApplicationID'];
        $secondaryOccF = $row3['SecondaryOccupantFName'];
        $secondaryOccL = $row3['SecondaryOccupantLName'];
        $petBreed = $row3['Pet1Breed'];
        $employer = $row3['CurrentEmployerName'];
        $supervisorF = $row3['CurrentSupFName'];
        $supervisorL = $row3['CurrentSupLName'];
        $positionHeld = $row3['CurrentPositionName'];
        $prevEmp = $row3['PrevEmployerName'];
        $prevSupervisorF = $row3['PrevSupFName'];
        $prevSupervisorL = $row3['PrevSupLName'];
        $prevPosition = $row3['PrevPositionName'];
        
        //Previous Residence stuff
        $result4 = mysql_query("select * from PREVIOUSRESIDENCE where ApplicationID = '$appID'");
        $row4 = mysql_fetch_array($result4);
        $prevStreet = $row4['PrevStreetAddress'];
        $prevCity = $row4['PrevCity'];
        $prevState = $row4['PrevState'];
        $prevZip = $row4['PrevZip'];
        $prevLandlordF = $row4['PrevLandLordFName'];
        $prevLandlordL = $row4['PrevLandLordLName'];
        $prevReason = $row4['ReasonForLeaving'];
        
        
        
        //set variable to send email to all existing admins. Must implode to have comma in order to send email to all
        $result5 = mysql_query("select Email from USER where AccountType = 3");
        while($row5 = mysql_fetch_array($result5))
        {
            $addresses[] = $row5['address'];
        }
        $to2 = implode(", ", $addresses);
        
        
        $from2 = "From: noReply@leasehood.com \r\n";
        $subject2 = "Application Review";
        $mesg2 = "Dear LeaseHood Administrator,\n ".
                "<table><tr><td>Please review the following application listing: </td></tr>".
                "<tr><td>Applicant First and Last name:  </td><td>".$firstName." ".$lastName."</td></tr>".
                "<tr><td>Applicant User ID and Username: </td><td>".$_SESSION[userid].", ".$username."</td></tr>".
                "<tr><td>Applicant Current Address:  </td><td>".$address." ".$city." ".$state." ".$zip."</td></tr>".
                "<tr><td>Secondary Occupant Names: </td><td>".$secondaryOccF." ".$secondaryOccL."</td></tr>".
                "<tr><td>Pet Breed: </td><td>".$petBreed."</td></tr>".
                "<tr><td>Employer: </td><td>".$employer."</td></tr>".
                "<tr><td>Supervisor Name: </td><td>".$supervisorF." ".$supervisorL."</td></tr>".
                "<tr><td>Position Held: </td><td>".$positionHeld."</td></tr>".
                "<tr><td>Previous Employer: </td><td>".$prevEmp."</td></tr>".
                "<tr><td>Previous Supervisor Name: </td><td>".$prevSupervisorF." ".$prevSupervisorL."</td></tr>".
                "<tr><td>Previous Position: </td><td>".$prevPosition."</td></tr>".
                "<tr><td>Applicant Previous Address:  </td><td>".$prevStreet." ".$prevCity." ".$prevState." ".$prevZip."</td></tr>".
                "<tr><td>Previous Apartment Landlord Name: </td><td>".$prevLandlordF." ".$prevLandlordL."</td></tr>".
                "<tr><td>Reason for leaving: </td><td>".$prevReason."</td></tr>".
                "Please either approve or deny this listing.</table>\n".
                "Regards,\nMark Gardner\nPresident|CEO";
                
        mail($to2, $subject2, $mesg2, $from2);
    
    mysql_close();
    
    header( 'Location: /payApplicationFee.php' );
    
?>
