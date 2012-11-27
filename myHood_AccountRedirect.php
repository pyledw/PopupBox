<?php

/*  THIS PAGE IS NOT YET TESTED AND LIKELY DOESN'T WORK YET. */


include_once ('config.inc.php');

session_start();
$username = $_SESSION['user']; 

if ($username)
{
	$autoSignIn = isset($_POST['autoSignIn']) ? $_POST['autoSignIn'] : null;
	$personalEmail = isset($_POST['personalEmail']) ? $_POST['personalEmail'] : null;
	$currentPassword = isset($_POST['currentPassword']) ? $_POST['currentPassword'] : null;
	$newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : null;
	$newPassword2 = isset($_POST['newPassword2']) ? $_POST['newPassword2'] : null;
	$currentEmail = isset($_POST['currentEmail']) ? $_POST['currentEmail'] : null;
	$newEmail1 = isset($_POST['newEmail1']) ? $_POST['newEmail1'] : null;
	$newEmail2 = isset($_POST['newEmail2']) ? $_POST['newEmail2'] : null;
	
	//TODO: autoSignIn
	//TODO: personalEmail - "Would like messages from LeaseHood about specials?"
	
	$con = get_dbconn("PDO");
	if ($newPassword and $newPassword2 and $currentPassword and $newPassword == $newPassword2)
	{
		$encPW = crypt($currentPassword, $pw_salt);
		$stmt = $con->prepare("UPDATE USER SET PASSWORD = :newpw WHERE UserName = :username AND Password = :oldpw;");
		$stmt->bindValue(":username", $username,    PDO::PARAM_STR);
		$stmt->bindValue(":oldpw",    $encPW,       PDO::PARAM_STR);
		$stmt->bindValue(":newpw",    $newPassword, PDO::PARAM_STR);
		$stmt->execute();
		if ($stmt->rowCount() < 1)
		{
			// username doesn't exist or password is wrong
		}
	}

	if ($newEmail1 and $newEmail2 and $currentEmail and $newEmail1 == $newEmail2)
	{
		$stmt = $con->prepare("UPDATE USER SET Email = :newemail WHERE UserName = :username AND Email = :oldemail;");
		$stmt->bindValue(":username", $username,     PDO::PARAM_STR);
		$stmt->bindValue(":oldemail", $currentEmail, PDO::PARAM_STR);
		$stmt->bindValue(":newemail", $newEmail1,    PDO::PARAM_STR);
		$stmt->execute();
		if ($stmt->rowCount() < 1)
		{
			// username doesn't exist or email is wrong
		}

	}
}



?>

