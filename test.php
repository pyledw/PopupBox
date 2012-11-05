<?
$p = $_SERVER['REQUEST_URI'];
$query = parse_url($p, PHP_URL_QUERY);
parse_str($query);



//	$o = array(
//		"jason" => "amy",
//		45 => 99,
//		"x" => $args
//		);
//	$s = json_encode($o);
//echo $s;


?>
