<?php
include_once 'config.inc.php';

//Search function gets the Type of search, and the Term to search by.  It then will return the approprite query result
//based on what type and what term you selected.
function search($type,$term)
    {
            $con = get_dbconn("");
            if($term != NULL)
            {
                if($type == 'zip')
                {
                    //This will be used in order to allow searching via Zip code.  It will take the users inputed Zip
                    //and convert it into lat and lon in order to query the locations of the properties.
                    include_once 'locationLookup.php';
                    $location = getLatandLongZip($term);
                    $lat = $location[0];
                    $lon = $location[1];

                    $maxLat = $lat + .5;
                    $maxLon = $lon + .5;
                    $minLat = $lat - .5;
                    $minLon = $lon - .5;

                    //echo 'TYPE : '. $type . " " . $term . 'Search Location:' . $lat ." ". $lon ." <br/>". $maxLat ." ". $maxLon ." <br/>". $minLat ." ". $minLon;


                    $result = mysql_query("SELECT * FROM PROPERTY
                        INNER JOIN AUCTION
                        ON PROPERTY.PropertyID=AUCTION.PropertyID
                        WHERE Lattitude <= '$maxLat' AND Lattitude >= '$minLat' AND Longitude <= '$minLon' AND Longitude >= '$maxLon' ");

                    if(!$result)
                    {
                         die('could not connect: ' .mysql_error());
                    }
                }
                if($type == 'address')
                {
                    $trimmed = trim($term);

                    $result = mysql_query("SELECT * FROM PROPERTY
                        INNER JOIN AUCTION
                        ON PROPERTY.PropertyID=AUCTION.PropertyID
                        WHERE Address LIKE \"%$trimmed%\"
                        ");
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
                        INNER JOIN AUCTION
                        ON PROPERTY.PropertyID=AUCTION.PropertyID

                        WHERE City LIKE \"%$trimmed%\"

                        ");
                    if(!$result)
                    {
                         die('could not connect: ' .mysql_error());
                    }
                }
            }
            else
            {
                $result = mysql_query("SELECT * FROM PROPERTY
                        INNER JOIN AUCTION
                        ON PROPERTY.PropertyID=AUCTION.PropertyID
                        ");
            }


            
            


           return $result;
    }
?>
