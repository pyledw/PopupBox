<?php
        if(isset($_POST[type]))
        {
            setcookie('searchType',$_POST[type]);
            setcookie('searchVal',$_POST[search]);
            header( 'Location: /searchResults.php' );
        }
        elseif($_GET[type])
        {
            setcookie('searchType',$_GET[type]);
            setcookie('searchVal',$_GET[term]);
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