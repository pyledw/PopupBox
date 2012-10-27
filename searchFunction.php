<?php
function search($type,$term)
    {
    
            include_once 'config.inc.php';
            $connectionInfo = get_dbconn();
            $con = $connectionInfo[0];
            $select = $connectionInfo[1];
            
            
            if($type == 'zip')
            {
                //This will be used in order to allow searching via Zip code.  It will take the users inputed Zip
                //and convert it into lat and lon in order to query the locations of the properties.
                include_once 'locationLookup.php';
                $location = getLatandLongZip($term);
                $lat = $location[0];
                $lon = $location[1];
                
                echo 'Search Location:' . $lat . $lon;
            }
            if($type == 'address')
            {
                echo 'Address' . $term;
            }
            if($type == 'city')
            {
                echo 'City' . $term;
            }


            //Query to select the user's application using their userID number
            $result = mysql_query("SELECT * FROM PROPERTY");
            if(!$result)
            {
                 die('could not connect: ' .mysql_error());
            }


           return $result;
    }
?>
