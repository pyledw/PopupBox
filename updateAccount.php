<?php

    session_start();
    include_once 'config.inc.php';
        //Connecting to the sql database
        $userPassword = $_POST['currentPassword'];
        $email = $_POST['currentEmail'];
        $newPassowrd = $_POST['newPassword1'];
        $newEmail = $_POST['newEmail1'];
        
        if($userPassword != '')
        {
            $con = get_dbconn("PDO");
                    $stmt = $con->prepare("SELECT * FROM USER WHERE UserID = :userID AND PASSWORD = :password");
                    $stmt->bindValue(":userID", $_SESSION['userID'], PDO::PARAM_STR);
                    $stmt->bindValue(":password", crypt($userPassword, $pw_salt), PDO::PARAM_STR);
                    $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row != NULL)
            {
                echo 'correct password';
                $con = get_dbconn("PDO");
                    $stmt = $con->prepare("UPDATE USER SET PASSWORD = :password
                        WHERE UserID = :userID");
                    $stmt->bindValue(":userID", $_SESSION['userID'], PDO::PARAM_STR);
                    $stmt->bindValue(":password", crypt($newPassowrd, $pw_salt), PDO::PARAM_STR);
                    $stmt->execute();

               header( 'Location: /myHood_Account.php?message=fields were updated' );
            }
            else
            {
                header( 'Location: /myHood_Account.php?message=Password incorrect' );
                echo 'password incorrect';
            }
        }
        if($email != '')
        {
            $con = get_dbconn("PDO");
                   $stmt = $con->prepare("SELECT * FROM USER WHERE UserID = :userID AND Email = :email");
                   $stmt->bindValue(":userID", $_SESSION['userID'], PDO::PARAM_STR);
                   $stmt->bindValue(":email", $email, PDO::PARAM_STR);
                   $stmt->execute();
           $row = $stmt->fetch(PDO::FETCH_ASSOC);
           if($row != NULL)
           {
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
                           header( 'Location: /myHood_Account.php?error=error, email already exist in the database' );
                       }
               header( 'Location: /myHood_Account.php?message=fields were updated' );     

           }
           else
           {
               header( 'Location: /myHood_Account.php?error=Our records show a differant email than the one entered.' );
           }
        }
        
        header( 'Location: /myHood_Account.php' );
?>
