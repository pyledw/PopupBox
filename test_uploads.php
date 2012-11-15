<html>
	<body>
		<form action="test_uploads.php" method="post" enctype="multipart/form-data">
			<label for="file">Filename:</label>
			<input type="file" name="file" id="file" />
			<br />
			<input type="submit" name="submit" value="Submit" />
		</form>

<?
include_once 'uploads.inc.php';
$result = array();
if (count($_FILES) > 0)
{
	$result = handle_uploads(4, $_FILES);
	echo "<pre>This is the return value from handle_uploads:";
	print_r($result);
	echo "</pre>";
	echo "<br /><br />";
	echo "THIS DEMONSTRATES HOW TO USE THE RETURN VALUE TO GENERATE IMG TAGS <br />";
	foreach ($result as $upload)
	{
		if (!$upload[error]) 
		{
	?>
			<img src='<?= $upload[name_full]; ?>'></img>
			<img src='<?= $upload[name_thumb]; ?>'></img>
	<?
		}
	}
}

echo "<br /><br />YOU CAN CALL 'get_uploads_for_property(n)' TO GET IMAGES THAT WERE PREVIOUSLY UPLOADED:<br />";
$result = get_uploads_for_property(4);
echo "<pre>"; 
print_r($result);
echo "</pre>";


?>
	</body>
</html> 
