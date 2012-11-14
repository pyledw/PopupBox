
<?php
    require_once "config.inc.php";
    session_start();
    $userType = $_POST["classification"];
    $classification = $userType == "tenant" ? "1" : "2";
    
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
                :dob )
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
        $stmt->bindValue(':dob',            $_POST['DOB'],              		PDO::PARAM_STR);
        $stmt->execute();
    } 
    catch (Exception $e) {
	echo 'Connection failed. ' . $e->getMessage();
    }

    echo "1 record added";

    
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
?>
