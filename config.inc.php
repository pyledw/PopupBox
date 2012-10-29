<!-- This file is for the database configuration, and host the Username and Password for database connections.
     It also hold the function to be called for creating the connection to the database-->

<?php

$cfg['show_buildinfo'] = true;

$db_user = 'leasehood';
$db_pass = 'sunlight blanket floating change';  // db password
$db_server = '199.115.231.216';     // server name or IP address
$db_database = 'leasehood';     // database to select


//This function creates a connection to the database and returns an array with the selected database.
function get_dbconn() {
    
    $db_user = 'leasehood';
    $db_pass = 'sunlight blanket floating change';
    $db_server = '199.115.231.216';
    $db_database = 'leasehood';

    $con = mysql_connect($db_server,$db_user,$db_pass );
    if(!$con)
    {
        die('could not connect: ' .mysql_error());
    }
    else
    {
        //echo "connected to mySQL";
    }

    $select = mysql_selectdb($db_database, $con);

    if(!$select)
    {
        die('could not connect: ' .mysql_error());
    }
    else
    {
        //echo "Selected Database";
    }
    $connectionInfo = array($con,$select);
    return $connectionInfo;
}



?>
