<?php
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
    
    //if this doesnt work or causes errors, change UserID to Username
    $getEmail = $con->query("select Email from USER where UserID ='$_SESSION[userID]'");
    if (!getEmail)
    {
        echo 'Could not find email';
    }
    else if($getEmail->num_rows == 0) 
    {
        echo 'UserID not in db';
    }
    else
    {
        $row = $getEmail->fetch_object();
        $email = $row->Email;
        $from = "From: info@leasehood.com \r\n";
        $mesg = 
    }
    
    mysql_close();
    
    header( 'Location: /payApplicationFee.php' );
    
?>
