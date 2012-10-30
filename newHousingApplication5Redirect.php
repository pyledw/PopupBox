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
    
    
    //Setting which page has been compleated.  If the form has already been compleated it ignors this
    if($row[PageCompleted] != "6")
    {
        
        mysql_query("UPDATE APPLICATION SET PageCompleted='6'
        WHERE UserID = '$_SESSION[userID]'");
    }
    
    mysql_close();
    
    header( 'Location: /myHood.php' );
    
?>
