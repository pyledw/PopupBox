<?php

$cfg['show_buildinfo'] = true;

$db_user = 'leasehood';
$db_pass = 'sunlight blanket floating change';  // db password
$db_server = '199.115.231.216';     // server name or IP address
$db_database = 'leasehood';     // database to select


function get_dbconn() {
    global $db_user, $db_pass, $db_server, $db_database;

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
    return $con;
}



?>
