<?php
/**
 * Configuration 
 *
 * This file is for the database configuration, and host the Username and Password for database connections.
 * It also hold the function to be called for creating the connection to the database.
 *
 * @package Configuration
 */

$db_user     = 'leasehood';
$db_pass     = 'sunlight blanket floating change';  // db password
$db_server 	 = '199.115.231.216';                   // server name or IP address
$db_database = 'leasehood1112';                     // database to select
$pw_salt     = '68f33ecb44592ddd476af4145a2eae9f';  // salt for password encryption

/**
 * Set this to the base address for this server.  By default it's the server name and server port.  It must
 * end with a '/'.
 */
$base_address = 'http://' . $_SERVER['SERVER_NAME'] .':'. $_SERVER['SERVER_PORT'] . '/';

$upload_max_size_mb 		= 2.0;          // maximum size of an uploaded image
$upload_thumbnail_size 		= 200;			// horizontal size of thumbnails, in pixels
$upload_max_uploads         = 7;            // a property can only have so many images uploaded
$upload_save_path 		= "uploads/";		// relative to docroot.  Must end with a '/'
$upload_allowed_file_types 	= array(		// all entries must be MIME types and lower-cased
	"image/jpeg",
	"image/gif",
	"image/png",
    "image/pjpeg",
	"image/tiff");

/*
 * These settings control Paypal.
 */
$paypal_SandboxFlag   =  true;								// Set to False to actually process payments
$paypal_API_UserName  = "jcdick_1350762445_biz_api1.mail.lipscomb.edu";			// Get these from paypal
$paypal_API_Password  = "1350762468";							// ..
$paypal_API_Signature = "APVEl-I7DVPD6FsgN8j9i9uRbqBwAvuRR9R-HmcBImCL3vso7E2pCm6- ";	// ..

/** 
 * Controls fee payment processing.  URLs for paypal return/cancel must be relative to docroot.
 */
$cfg_fees = array(
	'listing' => array(
		'description'   => 'Leasehood.com Property Listing Fee',
		'price'         => '10.00',
		'paypal-return' => $base_address . 'payListingFeeRedirect.php',
		'paypal-cancel' => $base_address . 'payListingFeeRedirect.php'),
	'application' => array(
        'description'   => 'Leasehood.com Application Fee',
        'price'         => '15.00',
        'paypal-return' => $base_address . 'payApplicationFeeRedirect.php',
        'paypal-cancel' => $base_address . 'payApplicationFeeRedirect.php')
	);



function get_dbconn($api) {
    global $db_user, $db_pass, $db_server, $db_database;
    $con = NULL;
    if ($api == NULL || $api == "mysql")
    {
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
    }
    else if ($api == "PDO") {
        $dsn = 'mysql:host=' . $db_server . ';dbname=' . $db_database;
        $options =  array(PDO::ATTR_PERSISTENT => true);
        try 
	{
            $con = new PDO($dsn, $db_user, $db_pass, $options);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	} catch (PDOException $e) {
            echo 'Connection failed. ' . $e->getMessage();
	}
    }
    return $con;
}



?>
