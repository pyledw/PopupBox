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
                
                $result = mysql_query("SELECT * FROM PROPERTY");
                if(!$result)
                {
                     die('could not connect: ' .mysql_error());
                }
            }
            if($type == 'address')
            {
                $trimmed = trim($term);
                //echo 'Address ' . $term;
                $result = mysql_query("SELECT * FROM PROPERTY
                    WHERE Address LIKE \"%$trimmed%\"");
                if(!$result)
                {
                     die('could not connect: ' .mysql_error());
                }
            }
            if($type == 'city')
            {
                $trimmed = trim($term);
                //echo 'City ' . $term;
                $result = mysql_query("SELECT * FROM PROPERTY
                    WHERE City LIKE \"%$trimmed%\"
                    ");
                if(!$result)
                {
                     die('could not connect: ' .mysql_error());
                }
            }


            
            


           return $result;
    }
?>
