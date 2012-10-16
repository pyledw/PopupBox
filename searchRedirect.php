<?php


            $searchTerm = $_POST['search'];
            setcookie('search',$searchTerm);
            header( 'Location: /searchResults.php' );
?>
