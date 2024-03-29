<?php
    /**
     * This page will retrieve the search terms from the advanced search, and set those to a cookie.
     * 
     * It then reroutes the user to the search results.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    session_start();

     $advancesSearchQuery = "SELECT * FROM AUCTION
                        LEFT JOIN PROPERTY
                        ON PROPERTY.PropertyID=AUCTION.PropertyID
                        WHERE NOW() BETWEEN AUCTION.DatePFOAccept AND AUCTION.DatePFOEndAccept 
                        AND IsApproved=1";
            
    if($_POST['zip'] != '')
    {
            include_once 'locationLookup.php';//retireves location based functions
            $location = getLatandLongZip($_POST['zip']);//this function will return an array of the lat and long of the zip code
                    $lat = $location[0]; //pulling from array
                    $lon = $location[1]; //pulling from array

                    $distance = .5; //setting distance from the inital point
                    
                    //calculating the barriers of the search
                    $maxLat = $lat + $distance;  
                    $maxLon = $lon + $distance;
                    $minLat = $lat - $distance;
                    $minLon = $lon - $distance;
                    
                    $advancesSearchQuery = $advancesSearchQuery . " AND Lattitude <= '$maxLat' AND Lattitude >= '$minLat' AND 
                                Longitude <= '$minLon' AND Longitude >= '$maxLon'";
                    
    }
    if($_POST['city'] != '')
    {
        $trimmed = trim($_POST['city']);//trimming the term to search for any part
        
        $advancesSearchQuery = $advancesSearchQuery . " AND City LIKE '%$trimmed%'";
        
    }
    if($_POST['street'] != '')
    {
        $trimmed = trim($_POST['street']);//trimming the term to search for any part
        
        $advancesSearchQuery = $advancesSearchQuery . " AND Address LIKE '%$trimmed%'";
    }
    if($_POST['county'] != '')
    {
        $trimmed = trim($_POST['county']);//trimming the term to search for any part
        
        $advancesSearchQuery = $advancesSearchQuery . " AND County LIKE '%$trimmed%'";
    }
    if($_POST['min-Bedrooms'] != '0')
    {
        if($_POST['min-Bedrooms'] == '4+')
        {
            $advancesSearchQuery = $advancesSearchQuery . " AND Bedroom >=4 ";
        }
        else
        {
            $advancesSearchQuery = $advancesSearchQuery . " AND Bedroom >=".$_POST['min-Bedrooms']."";
        }
        
    }
    if($_POST['max-Bedrooms'] != '0' && $_POST['max-Bedrooms'] != '4+')
    {
        $advancesSearchQuery = $advancesSearchQuery . " AND Bedroom <=".$_POST['max-Bedrooms']."";
    }
    if($_POST['min-Bathrooms'] != '0')
    {
        if($_POST['min-Bathrooms'] == '3+')
        {
            $advancesSearchQuery = $advancesSearchQuery . " AND Bath >=3 ";
        }
        else
        {
            $advancesSearchQuery = $advancesSearchQuery . " AND Bath >=".$_POST['min-Bathrooms']."";
        }
         
    }
    if($_POST['max-Bathrooms'] != '0' && $_POST['max-Bathrooms'] != '3+')
    {
        $advancesSearchQuery = $advancesSearchQuery . " AND Bath <=".$_POST['max-Bathrooms']."";
    }
    if($_POST['min-SquareFeet'] != '')
    {
        $advancesSearchQuery = $advancesSearchQuery . " AND SF >=".$_POST['min-SquareFeet']."";
    }
    if($_POST['max-SquareFeet'] != '')
    {
        $advancesSearchQuery = $advancesSearchQuery . " AND SF <=".$_POST['max-SquareFeet']."";
    }
     
    
    $advancesSearchQuery = $advancesSearchQuery . " ORDER BY AUCTION.DatePFOEndAccept ASC";
    echo $advancesSearchQuery;
            setcookie('searchType','advanced');
            setcookie('searchVal','');
            $_SESSION['advancedSearchVal'] = $advancesSearchQuery;
            header( 'Location: /searchResults.php' );
    
            echo $_SESSION['advancedSearchVal'];
            
            

        
?>