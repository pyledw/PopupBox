<?
include_once 'config.inc.php';

function upload_size_is_okay($size_in_bytes)
{
    global $upload_max_size_mb;
    $MB = 1024 * 1024;
    return $size_in_bytes / $MB < $upload_max_size_mb;
}

function upload_get_save_path()
{
    global $upload_save_path;
    $d = new DateTime();
    $fn = $d->format("YmdHms") . strval(mt_rand());
    return $upload_save_path . $fn;
}

function handle_uploads($propertyID, $files) {

	$retval = array();
	
	foreach ($_files as $f) {
		$name = $f['name'];
		$type = $f['type'];
		$tmp_name = $f['tmp_name'];
		$size = $f['size'];
		$error = $f['error'];
	
		if ($error > 0) {		// non-zero values are error codes
			$retval["error"] = "error";
		}	
		else if (!upload_size_is_okay($size)) {
			$retval["error"] = "too big";
		}
		else if (strlen($tmp_name) == 0) {
			$retval["error"] = "no tmp file name";
		}
		else if (!in_array($type, $upload_allowed_file_types)) {
			$retval["error"] = "not a valid type";
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
		
			// write database record with the above filenames
			$con = get_dbconn("PDO");
			$stmt = $con->prepare("INSERT INTO IMAGE 
                                                  (PropertyID,  ImagePathOriginal, ImagePathThumb) values
                                                  (:propertyid, :originalpath,     :thumbpath)");
			$stmt->bindValue(':propertyid',    $propertyid,  PDO:PARAM_INT);
			$stmt->bindValue(':originalpath',  $name_full,   PDO:PARAM_STR);
			$stmt->bindValue(':thumbpath',     $name_thumb,  PDO:PARAM_STR);
			$stmt->execute();
			$id = $con->lastInsertId();
			
			$retval
		}
	}	
}
?>
