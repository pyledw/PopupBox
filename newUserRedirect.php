
<?php
    session_start();
    $userType = $_POST["classification"];
    $classification;
    if($userType == "tenant")
    {
        $classification = "1";
    }
    else 
    {
        $classification = "2";
    }
    //echo $userType;
    $server = "199.115.231.216";
    $username = "scribe";
    $password = "board his combination flat";
    $con = mysql_connect($server,$username,$password );
    if(!$con)
    {
        die('could not connect: ' .mysql_error());
    }
    else
    {
        //echo "connected to mySQL";
    }
    $select = mysql_selectdb("leasehood", $con);
    if(!$select)
    {
        die('could not connect: ' .mysql_error());
    }
    else
    {
        //echo "Selected Database";
    }
    $email = $_POST[email1];
    $sql="INSERT INTO USER (UserName, Password , DateCreated, AccountType ,Email ,SSN , FirstName, LastName, Street, City, State, Zip, DateOfBirth)
    VALUES
    ('$_POST[username]','$_POST[password1]','" . date('Y/m/d') . "','$classification','$email','$_POST[SSN]','$_POST[fname]','$_POST[lname]','$_POST[address]','$_POST[city]','$_POST[state]','$_POST[zip]','$_POST[DOB]')";
    
    if (!mysql_query($sql,$con))
    {
        die('Error: ' . mysql_error());
    }
    echo "1 record added";

    
    
    $result = mysql_query("SELECT * FROM USER
            WHERE UserName ='" . $_POST[username] . "'");
    $userData = mysql_fetch_array($result);
    
    $_SESSION['userID'] = $userData['UserID'];
    $_SESSION['user'] = $_POST['username'];
    
    mysql_close($con);
    if($userType == "tenant")
    {
        header( 'Location: /newHousingApplication.php' ) ;
    }
    else 
    {
        header( 'Location: /newListing1.php' );
    }
?>
