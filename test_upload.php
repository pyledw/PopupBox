<html>
	<body>
		<form action="test_upload.php" method="post" enctype="multipart/form-data">
			<label for="file">Filename:</label>
			<input type="file" name="file" id="file" />
			<br />
			<input type="submit" name="submit" value="Submit" />
		</form>
<?
include_once 'config.inc.php';
foreach ($_FILES as $f) {
	$name = $f['name'];
	$type = $f['type'];
	$tmp_name = $f['tmp_name'];
	$size = $f['size'];
	$error = $f['error'];
	
	if ($error > 0) {		// non-zero values are error codes
		echo "error";
	}	
	else if (!upload_size_is_okay($size)) {
		echo "too big";
	}
	else if (strlen($tmp_name) == 0) {
		echo "no tmp file name";
	}
	else if (!in_array($type, $upload_allowed_file_types)) {
		echo "not a valid type";
	}
	else { 
		echo "good!";
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
?>
		<img src="<?=$name_thumb?>"></img>
		<img src="<?=$name_full?>"></img>
<?
	}
}
require 'dev.php'; 
?>
	</body>
</html> 
