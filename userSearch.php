<?php
    /**
     * This page is the results when a administrator chooses to search for a user.
     * 
     * It gets all user whos usernames, firstname, or lastname corisponds with the search
     * It will then display those user accounts and give the option of emailing them, disabling
     * their account, or enabling thier account.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */

    $title = 'User Search';
    include_once 'Header.php';
    echo "<div id='wrapper'> ";
        include_once 'config.inc.php';
        //Connecting to the sql database
        $con = get_dbconn("");

        //Query the database for only the row containing that users information
        $trimmed = trim($_POST[userName]);

                    $result = mysql_query("SELECT * FROM USER
                        WHERE UserName LIKE \"%$trimmed%\" OR FirstName LIKE \"%$trimmed%\" OR LastName LIKE \"%$trimmed%\"
                        ");
                    if(!$result)
                    {
                         die('could not connect: ' .mysql_error());
                    }
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        echo "<table class='tableForm' width='800'>";
        
        while($row = mysql_fetch_array($result))
        {
            echo '<tr><td>' . $row[UserName] . '</td><td>' . $row[FirstName] . '</td><td>' . $row[LastName] . '</td><td><a href="mailto:' . $row[Email] . '">'. $row[Email] .'</a></td><td><a href="editUser.php?userID='. $row[UserID] .'&type=0">Disable User</a>
                <a href="editUser.php?userID='. $row[UserID] .'&type=1">Enable User</a></td><td><a href="editUser.php?userID='. $row[UserID] .'&type=2">Make Admin</a></td></tr>';
        }
    echo "</table></div>";
    include_once 'Footer.php';
?>
