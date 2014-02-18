<?php
	include("config/preferences.php");
	include("lib/database.php");
	include("lib/authenticate.php");

	// Grab the form variables
	$userName = $_POST["userName"];
	$password = md5($_POST["password"]);

	$db_connection = openDatabaseConnection($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

	$validUser = isValidUser($TABLE_PREFIX, $userName, $password, $DB_HOST, $DB_NAME);

	closeDatabaseConnection($db_connection);

	// If the user authenticates, set cookie & go to draft page.  Otherwise, return 
	// to login page and inform user of error.
	if ($validUser)
	{
		setcookie($TABLE_PREFIX."_draft_owner", "u=".$userName."&p=".$password, 0, "/");
		header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/drafted.php");
	}

	else
	{
		header("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/");
	}
?>
