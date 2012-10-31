<?php
header('Content-Type: text/plain');
session_start();

function dumpit($label, $data)
{
        echo "\r\n\r\n============================= " . $label . "=============================\r\n\r\n";
        print_r($data);
}


dumpit('$_SESSION', $_SESSION);
dumpit('  $_PUT  ', $_PUT);
dumpit('  $_GET  ', $_GET);
dumpit('$_COOKIE ', $_COOKIE);
dumpit('$_SERVER ', $_SERVER);


?>
