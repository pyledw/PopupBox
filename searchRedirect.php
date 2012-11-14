<?php
        if(isset($_POST[type]))
        {
            setcookie('searchType',$_POST[type]);
            setcookie('searchVal',$_POST[search]);
            header( 'Location: /searchResults.php' );
        }
        else
        {
            if(isset($_COOKIE['searchType']))
            {
                $type = $_COOKIE[searchType];
                $val = $_COOKIE[searchVal];
                header( 'Location: /searchResults.php' );
            }
            else
            {
                header( 'Location: /searchHomes.php' );
            }
        }
        
?>