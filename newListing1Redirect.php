<?php
    /**
     * This redirect page will retrieve all the application info in a form post.
     * 
     * it will then check to see if a property ID was given to it in the form of a session.
     * If session data is found it will create a new property record
     * If session data is found it will update the property ID with teh new data
     * It also retrieves the Lat and Lon based on the address entered.
     * It finally increments the page completed if the property has not already been completed.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */

    session_start();
    
    
    //Creating conneciton to the Database
    include_once 'config.inc.php';
	include_once 'log.inc.php';
        //Connecting to the sql database
    $con = get_dbconn("");

    
    if(!isset($_SESSION['propertyID']))
    {
            $con = get_dbconn("PDO");
            $stmt = $con->prepare("
            INSERT INTO PROPERTY (UserID,Address
                 )
            VALUES (
                :userID,:address )
            ");
            try {
                $stmt->bindValue(':userID',  $_SESSION['userID'],	PDO::PARAM_INT);
                $stmt->bindValue(':address', $_POST['address'],		PDO::PARAM_STR);
                $stmt->execute();
				$propertyID = $con->lastInsertId();
            } 
            catch (Exception $e) {
                logerror($e->getMessage());
            }
    }
    else
    {
        $propertyID = $_SESSION['propertyID'];
    }
    
    //This sction below will get the latitude and Longitude of the address and store it in the database
        include_once 'locationLookup.php';
        $location = getLatandLongAddress($_POST['address'], $_POST['city'], $_POST['state']);
        $lat = $location[0];
        $lon = $location[1];
       
    
    $con = get_dbconn("PDO");
    $stmt = $con->prepare("
            UPDATE PROPERTY SET
                Address=:address,                   Lattitude=:lat,                 Longitude=:lon,
                Zip=:zipCode,                       County=:county,
                City=:city,                         State=:state,                   SF=:sqrFt,
                Bedroom=:bedRooms,                  Bath=:bathRooms,                Garage=:garage,
                Heating=:heating,                   AC=:airConditioning,            Media=:media,
                IceMaker=:ice,                      DishWasher=:dishWasher,         Disposal=:disposal,
                ClothesWasher=:clothesWasher,       ClothesDryer=:clothesDryer,     Microwave=:microwave,
                SecurityAlarm=:security,            Deck=:deck,                     Pool=:pool,
                Fenced=:fenced,                     Description=:description,       ClothesWasherHookup=:washerHookup,
                ClothesDryerHookup=:dryerHookup,    ADACompliant=:ADA 
            WHERE PropertyID = :propertyid");
    try {
        $stmt->bindValue(':address',            $_POST['address'],		    PDO::PARAM_STR);
        $stmt->bindValue(':lat',                $lat,                       PDO::PARAM_STR);
        $stmt->bindValue(':lon',                $lon,                       PDO::PARAM_STR);
        $stmt->bindValue(':zipCode',            $_POST['zipCode'],		    PDO::PARAM_STR);
        $stmt->bindValue(':county',             $_POST['county'],		    PDO::PARAM_STR);
        $stmt->bindValue(':city',               $_POST['city'],             PDO::PARAM_STR);
        $stmt->bindValue(':state',              $_POST['state'],		    PDO::PARAM_STR);
        $stmt->bindValue(':sqrFt',              $_POST['sqrFt'],		    PDO::PARAM_STR);
        
        $stmt->bindValue(':bedRooms',           $_POST['bedRooms'],		    PDO::PARAM_STR);
        $stmt->bindValue(':bathRooms',          $_POST['bathRooms'],		PDO::PARAM_STR);
        $stmt->bindValue(':garage',             $_POST['garage'],		    PDO::PARAM_STR);
        $stmt->bindValue(':heating',            $_POST['heating'],		    PDO::PARAM_STR);
        $stmt->bindValue(':airConditioning',    $_POST['airConditioning'],	PDO::PARAM_STR);
        $stmt->bindValue(':media',              $_POST['media'],		    PDO::PARAM_STR);
        $stmt->bindValue(':ice',                $_POST['ice'],              PDO::PARAM_STR);
        
        $stmt->bindValue(':dishWasher',         $_POST['dishWasher'],		PDO::PARAM_STR);
        $stmt->bindValue(':disposal',           $_POST['disposal'],		    PDO::PARAM_STR);
        $stmt->bindValue(':clothesWasher',      $_POST['clothesWasher'],	PDO::PARAM_STR);
        $stmt->bindValue(':clothesDryer',       $_POST['clothesDryer'],		PDO::PARAM_STR);
        $stmt->bindValue(':microwave',          $_POST['microwave'],		PDO::PARAM_STR);
        $stmt->bindValue(':security',           $_POST['security'],		    PDO::PARAM_STR);
        $stmt->bindValue(':deck',               $_POST['deck'],             PDO::PARAM_STR);
        $stmt->bindValue(':pool',               $_POST['pool'],             PDO::PARAM_STR);
        $stmt->bindValue(':fenced',             $_POST['fenced'],		    PDO::PARAM_STR);
        $stmt->bindValue(':description',        $_POST['description'],		PDO::PARAM_STR);
        $stmt->bindValue(':washerHookup',       $_POST['washerHookup'],		PDO::PARAM_STR);
        $stmt->bindValue(':dryerHookup',        $_POST['dryerHookup'],		PDO::PARAM_STR);
        $stmt->bindValue(':ADA',                $_POST['ADA'],              PDO::PARAM_STR);
		$stmt->bindValue(':propertyid',         $propertyID,                PDO::PARAM_INT);
        
        $stmt->execute();
    } catch (Exception $e) {
		logerror($e->getMessage());
    }

    $con = get_dbconn("");
    $result = mysql_query("SELECT PageCompleted FROM PROPERTY
        WHERE PropertyID='$propertyID'");
    
     if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
    $row = mysql_fetch_array($result);
    
    echo $row['PageCompleted'];
    
    //Setting which page has been compleated.  If the form has already been compleated it ignors this
    if($row['PageCompleted'] != "6")
    {
        
        mysql_query("UPDATE PROPERTY SET PageCompleted='2'
        WHERE PropertyID='$propertyID'");
    }
    
    $_SESSION['propertyID'] = $propertyID;
    
    
    mysql_close();
    
    header( 'Location: /newListing2.php' );
?>
