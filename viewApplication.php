<?php
    session_start();
    $applicationID = $_POST[applicationID];
    
    include_once 'config.inc.php';
            //Connecting to the sql database
            $connectionInfo= get_dbconn();
            $con = $connectionInfo[0];
            $select = $connectionInfo[1];
            
            $result = mysql_query("SELECT * FROM APPLICATION
                WHERE ApplicationID = '$applicationID'");
            
            $row = mysql_fetch_array($result);
           
?>

<div id="Application">
    <div id="header"><h1>Tenant Application</h1></div>
    <div class="content">
        <?php
            
        ?>
    </div>
</div>
