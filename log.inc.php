<?

require_once 'log4php/Logger.php';
Logger::configure("config/log4php.xml");

function loginfo($msg) 
{
	$logger = Logger::getLogger("main");
	$logger->info($msg);
}

function logdebug($msg)
{
	$logger = Logger::getLogger("main");
        $logger->debug($msg);
}

function logerror($msg)
{
        $logger = Logger::getLogger("main");
        $logger->error($msg);
}

?>
