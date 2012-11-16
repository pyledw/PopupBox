<?php
    /**
    * Functions for the Searching of listings
    *
    * @package SearchListingFunctions
    *
    */



include_once 'config.inc.php';//retrieving the required config informaiton

/**
 * This funciton recieves the search stype and the search term.  It then determins which
 * search type needs to be preformed.  It then returns the query based off the
 * information it was given.
 *
 * @param string $type a term that contains the actual search string the user has inputed
 * 
 * @param string $term this represents the type of search the user selected.  Is based off of the drop down box on the search form
 *
 * @return array $result A query based off the $type and $term
 * 
 * @author David Pyle <Pyledw@Gmail.com>
 */
function search($type,$term)
    {
            $con = get_dbconn("");
            if($term != NULL) //Check to ensure the user entered a value
            {
                if($type == 'zip')//if the user specified they wish to seach by zip
                {
                    
                    include_once 'locationLookup.php';//retireves location based functions
                    
                    
                    $location = getLatandLongZip($term);//this function will return an array of the lat and long of the zip code
                    $lat = $location[0]; //pulling from array
                    $lon = $location[1]; //pulling from array

                    $distance = .5; //setting distance from the inital point
                    
                    //calculating the barriers of the search
                    $maxLat = $lat + $distance;  
                    $maxLon = $lon + $distance;
                    $minLat = $lat - $distance;
                    $minLon = $lon - $distance;

                    //echo 'TYPE : '. $type . " " . $term . 'Search Location:' . $lat ." ". $lon ." <br/>". $maxLat ." ". $maxLon ." <br/>". $minLat ." ". $minLon;

                    //This query is searching based of the lat and lon.  will return all aucitons wit hproperties within the selected area
                    $result = mysql_query("SELECT * FROM AUCTION
                        JOIN PROPERTY
                        ON PROPERTY.PropertyID=AUCTION.PropertyID
                        WHERE Lattitude <= '$maxLat' AND Lattitude >= '$minLat' AND Longitude <= '$minLon' AND Longitude >= '$maxLon' ");

                    if(!$result)
                    {
                         die('could not connect: ' .mysql_error());
                    }
                }
                if($type == 'address') // if the type is equal to address meaning the user wants to search by address
                {
                    $trimmed = trim($term);//trimming the term to search for any part

                    //this query will search for any listing address that contains any of the elemens of the term
                    $result = mysql_query("SELECT * FROM AUCTION
                        JOIN PROPERTY
                        ON PROPERTY.PropertyID=AUCTION.PropertyID
                        WHERE Address LIKE \"%$trimmed%\"
                        ");
                    
                    if(!$result)
                    {
                         die('could not connect: ' .mysql_error());
                    }
                }
                if($type == 'city')// if the type is equal to city meaning the user wishes to search based on city
                {
                    $trimmed = trim($term);//trimming the term to search for any part
                    //echo 'City ' . $term;
                    
                    //This query will search for any auctions that the city is like the search term
                    $result = mysql_query("SELECT * FROM AUCTION
                        JOIN PROPERTY
                        ON PROPERTY.PropertyID=AUCTION.PropertyID
                        WHERE City LIKE \"%$trimmed%\"

                        ");
                    
                    if(!$result)
                    {
                         die('could not connect: ' .mysql_error());
                    }
                }
            }
            else  //if the user did not input anything in the search field
            {
                //returns all properties with aucitons
                $result = mysql_query("SELECT * FROM AUCTION
                            JOIN PROPERTY
                            ON PROPERTY.PropertyID=AUCTION.PropertyID
                        ");
            }


            
            


           return $result;//returning the query to the search page
    }
?>
