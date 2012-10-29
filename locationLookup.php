<?php

//This function takes the mailing address and retrievs the LAT and LON of the address
function getLatandLongAddress($addr,$city,$state)
{ 
	global $lat;
	global $lng;
 
  $doc = new DOMDocument();
  $doc->load("http://maps.google.com/maps/api/geocode/xml?address=".$addr.",+".$city.",+".$state."&sensor=false"); //input address
 
  //traverse the nodes to get to latitude and longitude
  $results = $doc->getElementsByTagName("result");
  $results = $results->item(0);
  $results = $results->getElementsByTagName("geometry");
  $results = $results->item(0);
  $results = $results->getElementsByTagName("location");
  
  foreach($results as $result)
		{
		$lats = $result->getElementsByTagName("lat");
		$lat = $lats->item(0)->nodeValue;
 
		$lngs = $result->getElementsByTagName("lng");
		$lng = $lngs->item(0)->nodeValue;
		}      
        $location = array($lat,$lng);
        return $location;
}

//This function takes teh zip code and returns the LAT and LON of the ZIP code
function getLatandLongZip($Zip)
{ 
	global $lat;
	global $lng;
 
  $doc = new DOMDocument();
  $doc->load("http://maps.google.com/maps/api/geocode/xml?address=".$Zip."&sensor=false"); //input address
 
  //traverse the nodes to get to latitude and longitude
  $results = $doc->getElementsByTagName("result");
  $results = $results->item(0);
  $results = $results->getElementsByTagName("geometry");
  $results = $results->item(0);
  $results = $results->getElementsByTagName("location");
  
  foreach($results as $result)
		{
		$lats = $result->getElementsByTagName("lat");
		$lat = $lats->item(0)->nodeValue;
 
		$lngs = $result->getElementsByTagName("lng");
		$lng = $lngs->item(0)->nodeValue;
		}      
        $location = array($lat,$lng);
        return $location;
}	
?>
