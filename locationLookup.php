<?php
/**
 * These functions are geared to the lookup and retrieval of geolocation of properties
 * 
 * @package LocationFunctions
 */



/**
 * 
 * This function will recive the address, city, and state of a property.
 * It then uses a google api to retireve the location based on that address
 * It will then convert the geolocation into lat and Lon and return it back to where it was called.
 * 
 * @global type $lat The Latitude of the location
 * 
 * @global type $lng The longitude of the property
 * 
 * @param type $addr The address of the property
 * 
 * @param type $city The City of the property
 * 
 * @param type $state The state of the property
 * 
 * @return array $location This contains teh lat and lon in an array
 * 
 * @author David Pyle <Pyledw@Gmail.com>
 * 
 */
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

/**
 * This funciton returns the Lat and Lon based on the zip code entered
 * it will use a google api to fint the location and then it converts that location
 * to a Lat and Lon cordanates.  It then returns them back.
 * 
 * @global type $lat The latidute of teh zip code
 * @global type $lng The longitude of the zip code
 * @param type $Zip the zip code given to find location on
 * @return Array $location contains both the lat and lon
 * 
 * @author David Pyle <Pyledw@Gmail.com>
 */
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
