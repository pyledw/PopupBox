<html>
	<body>
		<form action="test_uploads.php" method="post" enctype="multipart/form-data">
			<label for="file">Filename:</label>
			<input type="file" name="file" id="file" />
			<br />
			<input type="submit" name="submit" value="Submit" />
		</form>
		<pre>

<?
include_once 'uploads.inc.php';
if (count($_FILES) > 0)
{
	$result = handle_uploads(3, $_FILES);
	print_r($result);
}
?>
		</pre>
	</body>
</html> 
