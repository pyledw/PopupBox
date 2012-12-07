<?php
    /**
     * This page will test the users inputed variables and ensure that the
     * data they entered coencides with their account.  It will then update
     * The data that entered and check to ensure that no duplicates exist in
     * the database.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */


    session_start();
    include_once 'config.inc.php';
        //Connecting to the sql database
        $userPassword = $_POST['currentPassword'];
        $email = $_POST['currentEmail'];
        $newPassowrd = $_POST['newPassword1'];
        $newEmail = $_POST['newEmail1'];
        
        
        if($userPassword != '' && $newPassowrd != '')//Check to see if the user entered data for the password field
        {
            $con = get_dbconn("PDO");
                    $stmt = $con->prepare("SELECT * FROM USER WHERE UserID = :userID AND PASSWORD = :password");
                    $stmt->bindValue(":userID", $_SESSION['userID'], PDO::PARAM_STR);
                    $stmt->bindValue(":password", crypt($userPassword, $pw_salt), PDO::PARAM_STR);
                    $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row != NULL)//if the user entered a correct password
            {
                echo 'correct password';
                $con = get_dbconn("PDO");
                    $stmt = $con->prepare("UPDATE USER SET PASSWORD = :password
                        WHERE UserID = :userID");
                    $stmt->bindValue(":userID", $_SESSION['userID'], PDO::PARAM_STR);
                    $stmt->bindValue(":password", crypt($newPassowrd, $pw_salt), PDO::PARAM_STR);
                    $stmt->execute();

               header( 'Location: /myHood_Account.php?message=fields were updated' );//sending the user back and displaying a success message
            }
            else//if the user did not enter a correct password
            {
                header( 'Location: /myHood_Account.php?error=Password incorrect' );//Letting them know they entered an incorrect password.
                echo 'password incorrect';
            }
        }
     
        elseif($email != '' && $newEmail != '')//Check to see if the user entered an email to update
        {
            $con = get_dbconn("PDO");
                   $stmt = $con->prepare("SELECT * FROM USER WHERE UserID = :userID AND Email = :email");
                   $stmt->bindValue(":userID", $_SESSION['userID'], PDO::PARAM_STR);
                   $stmt->bindValue(":email", $email, PDO::PARAM_STR);
                   $stmt->execute();
           $row = $stmt->fetch(PDO::FETCH_ASSOC);
           if($row != NULL)//if the email  coencides with the one on file
           {
               $message = 'Email Updated';
               echo 'correct email';
               $con = get_dbconn("PDO");
                   $stmt = $con->prepare("UPDATE USER SET Email = :email
                       WHERE UserID = :userID");
                   $stmt->bindValue(":userID", $_SESSION['userID'], PDO::PARAM_STR);
                   $stmt->bindValue(":email", $newEmail, PDO::PARAM_STR);
                   try{
                   $stmt->execute();
                   } catch (Exception $e) 
                       {
                           $error = 'error, email already exist in the database';// if there is already an email on file
                       }
           }
           else
           {
               $error = 'Our records show a differant email than the one entered.';//setting error message
           }
           if(isset($error))
           {
               header( 'Location: /myHood_Account.php?error='.$error.'');//returning if error message
           }
           else
           {
               header( 'Location: /myHood_Account.php?message='.$message.'');//returnign if message was success
           }
        }
        else
        {
            header( 'Location: /myHood_Account.php?message=No data was entered' );//return if no data was entered
        }
        
?>
