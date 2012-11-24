<?

require_once 'log4php/Logger.php';
Logger::configure("config/log4php.xml");

function loginfo($msg) 
{
	$logger = Logger::getLogger($_SERVER["SCRIPT_FILENAME"]);
	$logger->info($msg);
}

function logdebug($msg)
{
	$logger = Logger::getLogger($_SERVER["SCRIPT_FILENAME"]);
    $logger->debug($msg);
}

function logerror($msg)
{
	$logger = Logger::getLogger($_SERVER["SCRIPT_FILENAME"]);
    $logger->error($msg);
}

?>
