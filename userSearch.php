<?php

    include_once 'Header.php';
    echo "<div id='wrapper'> ";
        include_once 'config.inc.php';
        //Connecting to the sql database
        $con = get_dbconn("");

        //Query the database for only the row containing that users information
        $trimmed = trim($_POST[userName]);

                    $result = mysql_query("SELECT * FROM USER
                        
                        WHERE UserName LIKE \"%$trimmed%\"
                        ");
                    if(!$result)
                    {
                         die('could not connect: ' .mysql_error());
                    }
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        echo "<table class='tableForm'>";
        
        while($row = mysql_fetch_array($result))
        {
            echo '<tr><td>' . $row[UserName] . '</td><td><a href="editUser.php?userID='. $row[UserID] .'&type=0">Disable User</a>
                <a href="editUser.php?userID='. $row[UserID] .'&type=1">Enable User</a></td></tr>';
        }
    echo "</table></div>";
    include_once 'Footer.php';
?>
