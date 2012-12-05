<?php
    /**
     * This redirect page will retrieve all the application info in a form post.
     * 
     * it will then check to see if a property ID was given to it in the form of a session.
     * If session data is found it will create a new property record
     * If session data is found it will update the property ID with teh new data
     * It finally increments the page completed if the property has not already been completed.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    session_start();
	include_once 'log.inc.php';
    
     //Test to check if user is logged in or not IF not they will be redirected to the login page
    if(!isset($_SESSION['userID']))
    {
		loginfo('No user id on session.  Going back to loginRequired.');
        header( 'Location: /loginRequired.php' ) ;
    }
    
    if(isset($_SESSION['propertyID']))
    {
        $propertyID = $_SESSION['propertyID'];
    }
    elseif(isset($_POST['propertyID']))
    {
        $propertyID = $_POST['propertyID'];
        $_SESSION['propertyID'] = $propertyID;
    }
    else
    {
		loginfo('No property id on session or post?  Going back to myhood');
        header( 'Location: /myHood.php' );
    }

	logdebug("Property id: $propertyID");
    require_once "config.inc.php";
         
    $con = get_dbconn("");
    
    
    
    $result = mysql_query("SELECT PageCompleted FROM PROPERTY WHERE PropertyID='$_SESSION[propertyID]'");
    
     if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
    $row = mysql_fetch_array($result);
    
    // echo $row[PageCompleted];
    
    //Setting which page has been compleated.  If the form has already been compleated it ignors this
    if($row['PageCompleted'] != "6")
    {
        
        mysql_query("UPDATE PROPERTY SET PageCompleted='6' WHERE PropertyID='$_SESSION[propertyID]'");
    }
    //sending email to landlord
        $to = $_POST['email'];
        $from = "From: noReply@leasehood.com \r\n";
        $subject = "Thank you for your Application";
        $mesg = "Dear landlord,\n"."Thank you for using LeaseHood.com for your rental needs.  Your property listing has been submitted. ".
                "You will notified within approximately two (2) business days regarding the status of your application with LeaseHood.com, ".
                "confirming your status to submit a Proposal for Occupancy. " .
                "Thank you again for joining LeaseHood and we hope your experience with us is a positive one.  Should you have any questions, please email us at info@LeaseHood.com.\n".
                "Regards,\n Mark Gardner\n President|CEO";
        mail($to, $subject, $mesg, $from);
        
    //sending email to admin 
        //get everything associated with the new property listing
        $result2 = mysql_query("select * from PROPERTY where PropertyID = '$propertyID'");
        $row2 = mysql_fetch_array($result2);
        $userid = $row2['UserID'];
        $address = $row2['Address'];
        $zip = $row2['Zip'];
        $city = $row2['City'];
        $state = $row2['State'];
        $county = $row2['County'];
        
        
        
        //get landlord name from user table
        $result3 = mysql_query("select * from USER where UserID = '$userid'");
        $row3 = mysql_fetch_array($result3);
        $username = $row3['UserName'];
        $firstName = $row3['FirstName'];
        $lastName = $row3['LastName'];
        
        
        //set variable to send email to all existing admins. Must implode to have comma in order to send email to all
        $result4 = mysql_query("select Email from USER where AccountType = 3");
        while($row4 = mysql_fetch_array($result4))
        {
            $addresses[] = $row4['address'];
        }
        $to2 = implode(", ", $addresses);
        
        
        $from2 = "From: noReply@leasehood.com \r\n";
        $subject2 = "Property Listing Review";
        $mesg2 = "Dear LeaseHood Administrator,\n ".
                "<table><tr><td>Please review the following property listing from: </td></tr>".
                "<tr><td>Property Listing ID:  </td><td>".$propertyID."</td></tr>".
                "<tr><td>Landlord User ID and Username: </td><td>".$userid.", ".$username."</td></tr>".
                "<tr><td>First and Last Name: </td><td>".$firstName." ".$lastName."</td></tr>".
                "<tr><td>Property Address:  </td><td>".$address." ".$county.", ".$city." ".$state." ".$zip."</td></tr>".
                "Please either approve or deny this listing.\n".
                "Regards,\nMark Gardner\nPresident|CEO";
                
        mail($to2, $subject2, $mesg2, $from2);
    

    mysql_close();
    
    header( 'Location: /payListingFee.php' );
?>
