<?php

$cfg['show_buildinfo'] = true;

$db_user = 'leasehood';
$db_pass = 'sunlight blanket floating change';
$db_server = '199.115.231.216';
$db_database = 'leasehood';


/*function get_dbconn() {
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
*/
?>
