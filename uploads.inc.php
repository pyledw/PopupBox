<?
/**
 * Functions for the processing, storage and retrieval of uploaded images.
 *
 * @package Uploads
 *
 */

include_once 'config.inc.php';

/**
 * Tests that the input file size in bytes is permitted according to configuration.
 *
 * @global $upload_max_size_mb
 * 
 * @param int $size_in_bytes A non-negative integer for the number of bytes in an uploaded file.
 *
 * @return bool True if the size is less than the configured max size; false otherwise.
 */
function upload_size_is_okay($size_in_bytes)
{
    global $upload_max_size_mb;
    $MB = 1024 * 1024;
    return ($size_in_bytes / $MB) < $upload_max_size_mb;
}

/**
 * Generates a filename for an uploaded file.  This filename does not include a suffix and extension and is not guaranteed unique.
 *
 * @global $upload_save_path
 *
 * @return string A path relative to the document root.
 */
function upload_get_save_path()
{
    global $upload_save_path;
    $d = new DateTime();
    $fn = $d->format("YmdHms") . strval(mt_rand());
    return $upload_save_path . $fn;
}

/** 
 * Writes a record to the IMAGE table.
 *
 * @param int $propertyid Primary key of the related Property, from the PROPERTY table.
 *
 * @param string $name_full The filename of the full-sized image, relative to document root.
 *
 * @param string $name_thumb The filename of the thumbnail image, relative to document root.
 * 
 * @return int ID of the inserted database record.  NULL is returned if an error occurred.
 */
function upload_write_database_record($propertyid, $name_full, $name_thumb)
{
	try 
	{
	    $con = get_dbconn("PDO");
    	$stmt = $con->prepare("INSERT INTO IMAGE 
        	                         (PropertyID,  ImagePathOriginal, ImagePathThumb) values
            	                     (:propertyid, :originalpath,     :thumbpath)");
	    $stmt->bindValue(':propertyid',    $propertyid,  PDO::PARAM_INT);
    	$stmt->bindValue(':originalpath',  $name_full,   PDO::PARAM_STR);
	    $stmt->bindValue(':thumbpath',     $name_thumb,  PDO::PARAM_STR);
    	$stmt->execute();
	    $id = $con->lastInsertId();
	} catch (Exception $e) {
		$id = NULL;
	}
	return $id;
}

/**
 * Stores an uploaded file to the filesystem and writes a corresponding record to the database.
 *
 * This method takes a PHP uploaded temporary file, stores it and its thumbnail to the filesystem,
 * and writes a record to the database in the IMAGE table.  This method returns an array containing
 * a variety of useful information:
 *
 * * error: true if an error occurred, false otherwise;
 * * error_msg: if an error occurred, a string describing the problem, otherwise NULL.  Possible values are:
 * * * "too big"
 * * * "no temp filename?"
 * * * "not a valid type"
 * * * "unknown error"
 * * name_full: the filename of the full-size image
 * * name_thumb: the filename of the thumbnail image
 * * id: the primary key ID of the IMAGE table belonging to this image
 *
 * @global $upload_thumbnail_size
 *
 * @global $upload_allowed_file_types 
 *
 * @param int $propertyid Primary key of the related Property, from the PROPERTY table.
 *
 * @param array @file PHP uploaded file information, from $_FILES.  Note this is a single entry from $_FILES, not the
 * entire collection.
 *
 * @return mixed An array containing information about the uploaded file.  See the method description.
 */
function handle_single_upload($propertyid, $file)
{
    global $upload_thumbnail_size;
    global $upload_allowed_file_types;

    $name = $file['name'];
    $type = $file['type'];
    $tmp_name = $file['tmp_name'];
    $size = $file['size'];
    $error = $file['error'];

    if ($error > 0) {       // non-zero values are error codes
        $retval = array(
			"error"     => true, 
			"error_msg" => "unknown error");
    }
    else if (!upload_size_is_okay($size)) {
        $retval = array(
			"error"     => true, 
			"error_msg" => "too big");
    }
    else if (strlen($tmp_name) == 0) {
        $retval = array(
			"error"     => true, 
			"error_msg" => "no temp filename?");
    }
    else if (!in_array($type, $upload_allowed_file_types)) {
        $retval = array(
			"error"     => true, 
			"error_msg" => "not a valid type");
    }
    else {
        $pi = pathinfo($name);
        $ext = $pi['extension'];
        $name_base = upload_get_save_path();
        $name_full  = "$name_base-full.$ext";
        $name_thumb = "$name_base-thumb.$ext";
        move_uploaded_file($tmp_name, $name_full);
        $img = new Imagick($name_full);
        $img->thumbnailImage($upload_thumbnail_size, 200, true);
        $img->writeImage($name_thumb);

		$id = upload_write_database_record($propertyid, $name_full, $name_thumb);

        $retval = array(
            "error"         => false, 
            "name_full"     => $name_full, 
            "name_thumb"    => $name_thumb,
            "id"            => $id);
	}
	return $retval;
}

/**
 * Handles the $_FILES array, calling handle_single_upload on each entry.
 *
 * @param int $propertyid Primary key of the related Property, from the PROPERTY table.
 *
 * @param array @files PHP $_FILES array, or a subset thereof.
 *
 * @return array An array of the results of each handle_single_upload call.
 */
function handle_uploads($propertyid, $files) 
{
	global $upload_thumbnail_size;
	global $upload_allowed_file_types;

	$retval = array();
	
	foreach ($files as $f) {
		$retval[] = handle_single_upload($propertyid, $f);
	}
	return $retval;	
}

/**
 * Retrieves upload filenames and IDs for a property.
 *
 * @param int $propertyid Primary key of the related Property, from the PROPERTY table.
 *
 * @return array Each entry of the array is itself an array containing the full filename, thumbnail filename, and ID of the image.
 *
 */
function get_uploads_for_property($propertyid)
{
	$con = get_dbconn("PDO");
	$stmt = $con->prepare("SELECT * FROM IMAGE WHERE PropertyID = :propertyid");
	$stmt->bindValue(":propertyid", $propertyid, PDO::PARAM_INT);
	$retval = $stmt->fetchAll();
	return $retval;
}


?>
