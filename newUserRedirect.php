
<script type="text/javascript" src="js/jquery-1.8.2.js"></script><!--Javascript Reference to Jquery-->
<?php

    /**
     * This page is the new user redirect
     * 
     * This page will attempt to enter the data into the database.
     * If the intert fails the user will be redirected to the new user
     * page with the error message.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    
    require_once "config.inc.php";
    session_start();
    $userType = $_POST["classification"];
    $classification = $userType == "tenant" ? "1" : "2";
    $exception = '';
    $con = get_dbconn("PDO");
    $stmt = $con->prepare("
            INSERT INTO USER (
                UserName,                 Password,                DateCreated,              AccountType,
                Email,                    SSN,                     FirstName,                LastName,
                Street,                   City,                    State,                    Zip, 
                DateOfBirth )
            VALUES (
                :username,                :password,               NOW(),                    :accountType,
                :email,                   :ssn,                    :firstName,               :lastName,
                :street,                  :city,                   :state,                   :zip,
                :dob                     )
            ");
    try {
        $stmt->bindValue(':username', 	    $_POST['username'],		 		PDO::PARAM_STR);
        $stmt->bindValue(':password', 	    crypt($_POST['password1'], $pw_salt),	PDO::PARAM_STR);
        $stmt->bindValue(':accountType',    $classification,            		PDO::PARAM_INT);
        $stmt->bindValue(':email',          $_POST['email1'],           		PDO::PARAM_STR);
        $stmt->bindValue(':ssn',            $_POST['SSN'],              		PDO::PARAM_STR);
        $stmt->bindValue(':firstName',      $_POST['fname'],            		PDO::PARAM_STR);
        $stmt->bindValue(':lastName',       $_POST['lname'],            		PDO::PARAM_STR);
        $stmt->bindValue(':street',         $_POST['address'],          		PDO::PARAM_STR);
        $stmt->bindValue(':city',           $_POST['city'],             		PDO::PARAM_STR);
        $stmt->bindValue(':state',          $_POST['state'],            		PDO::PARAM_STR);
        $stmt->bindValue(':zip',            $_POST['zip'],              		PDO::PARAM_STR);
        $stmt->bindValue(':dob',            $_POST['age'],              		PDO::PARAM_STR);
        //$stmt->bindValue(':phone',          $_POST['Phone'],              		PDO::PARAM_STR);
        $stmt->execute();
        
        
        $con = get_dbconn("");
        $result = mysql_query("SELECT * FROM USER
                WHERE UserName ='" . $_POST[username] . "'");
        $userData = mysql_fetch_array($result);

        $_SESSION['userID'] = $userData['UserID'];
        $_SESSION['user'] = $_POST['username'];
        $_SESSION['type'] = $classification;



        if($userType == "tenant")
        {
            header( 'Location: /newHousingApplication.php' ) ;
        }
        else 
        {
           header( 'Location: /newListing1.php' );
        }

    } 
    catch (Exception $e) {
        $exception = $e->getMessage();
        $pos = strpos($exception, "Email");
        //echo $line;
        echo $exception = $e->getMessage();
        
        
        if(!$pos)
        {
            echo $error = "Duplicate Username";
            echo '<form id="errormessage" method="post" action="newUser.php">
                        <input type="text" style="display:none;" name="username" value="'.$_POST['username'].'" />
                        <input type="text" style="display:none;" name="password" value="'.$_POST['password1'].'" />
                        <input type="text" style="display:none;" name="accountType" value="'.$classification.'" />
                        <input type="text" style="display:none;" name="email" value="'.$_POST['email1'].'" />
                        <input type="text" style="display:none;" name="ssn" value="'.$_POST['SSN'].'" />
                        <input type="text" style="display:none;" name="firstName" value="'.$_POST['fname'].'" />
                        <input type="text" style="display:none;" name="lastName" value="'.$_POST['lname'].'" />
                        <input type="text" style="display:none;" name="address" value="'.$_POST['address'].'" />
                        <input type="text" style="display:none;" name="city" value="'.$_POST['city'].'" />
                        <input type="text" style="display:none;" name="state" value="'.$_POST['state'].'" />
                        <input type="text" style="display:none;" name="zip" value="'.$_POST['zip'].'" />
                        <input type="text" style="display:none;" name="age" value="'.$_POST['age'].'" />
                        <input type="text" style="display:none;" name="phone" value="'.$_POST['phone'].'" />
                        <input type="text" style="display:none;" name="error" value="Duplicate Username" />
                  </form>';
            
        }
        else
        {
            echo $error = "Duplicate Email";
            echo '<form id="errormessage" method="post" action="newUser.php">
                        <input type="text" style="display:none;" name="username" value="'.$_POST['username'].'" />
                        <input type="text" style="display:none;" name="password" value="'.$_POST['password1'].'" />
                        <input type="text" style="display:none;" name="accountType" value="'.$classification.'" />
                        <input type="text" style="display:none;" name="email" value="'.$_POST['email1'].'" />
                        <input type="text" style="display:none;" name="ssn" value="'.$_POST['SSN'].'" />
                        <input type="text" style="display:none;" name="firstName" value="'.$_POST['fname'].'" />
                        <input type="text" style="display:none;" name="lastName" value="'.$_POST['lname'].'" />
                        <input type="text" style="display:none;" name="address" value="'.$_POST['address'].'" />
                        <input type="text" style="display:none;" name="city" value="'.$_POST['city'].'" />
                        <input type="text" style="display:none;" name="state" value="'.$_POST['state'].'" />
                        <input type="text" style="display:none;" name="zip" value="'.$_POST['zip'].'" />
                        <input type="text" style="display:none;" name="age" value="'.$_POST['age'].'" />
                        <input type="text" style="display:none;" name="phone" value="'.$_POST['phone'].'" />
                        <input type="text" name="error" value="Duplicate Email" />
                  </form>';
        }
         
    }
        $fName = $_POST['fname'];
        $username = $_POST['username'];
        $password = $_POST['password1'];
        $to = $_POST['email1'];
        $from = "From: noReply@leasehood.com \r\n";
        $subject = "Welcome To LeaseHood.com";
        $mesg = "Dear ".$fName.",\n"."Thank you for using LeaseHood.com for your rental needs. ".
                "Your LeaseHood account has now been created.\n".
                "Your username is: ".$username."\n".
                "Your password is: ".$password."\n".
                "Your username will be visible to others once you sign in. If you are a landlord, ".
                "we encourage you to complete your listing(s) so that you may expose your vacancy  as soon as possible. ".
                "If you are a lessee we encourage you to complete your application so that you may submit a Proposal for Occupancy and find your home as soon as possible. ".
                "Thank you for joining LeaseHood and we hope your experience with us is a positive one."."Regards,\n Mark Gardner\n President|CEO";
        mail($to, $subject, $mesg, $from);

    
    
    
    
?>
<script>
                    $(document).ready(function(){
                        $('#errormessage').submit();
                         });
                    $('#errormessage').submit();
</script>