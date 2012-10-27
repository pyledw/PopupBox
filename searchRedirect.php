<?php


            $type = $_POST[type];
            
            
            if($type == 'zip')
            {
            //This will be used in order to allow searching via Zip code.  It will take the users inputed Zip
            //and convert it into lat and lon in order to query the locations of the properties.
            include_once 'locationLookup.php';
            $location = getLatandLongZip("37221");
            $lat = $location[0];
            $lon = $location[1];
            
            }
            if($type == 'address')
            {
                
            }
            if($type == 'city')
            {
                
            }
            
            
            $searchTerm = $_POST['search'];
            setcookie('search',$searchTerm);
            header( 'Location: /searchResults.php' );
?>
