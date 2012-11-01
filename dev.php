<pre>
<?php

session_start();

function dumpit($label, $data)
{
	// start a new output buffer using ob_start to capture the output of var_dump.
	// we do this so string replaces work on the var_dump result.
	ob_start();
        echo "\r\n\r\n============================= " . $label . "=============================\r\n\r\n";
        if (isset($data))
		var_dump($data);
	else
		echo "Not set.";
	$str = ob_get_clean();
	$str = str_replace("  ",   "&nbsp;&nbsp;", $str);
	$str = str_replace("\r\n", "<br />",       $str);
	$str = str_replace("\n",   "<br />",       $str);
	$str = str_replace("\r",   "<br />",       $str);
	echo $str;
}


dumpit('$_SESSION', isset($_SESSION) ? $_SESSION : NULL);
dumpit('  $_PUT  ', isset($_PUT)     ? $_PUT     : NULL);
dumpit('  $_GET  ', isset($_GET)     ? $_GET     : NULL);
dumpit('$_COOKIE ', isset($_COOKIE)  ? $_COOKIE  : NULL);
dumpit(' $_FILES ', isset($_FILES)   ? $_FILES   : NULL);
dumpit('$_SERVER ', isset($_SERVER)  ? $_SERVER  : NULL);

?>
</pre>
