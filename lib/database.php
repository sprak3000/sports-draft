<?php
	// Database functions

	// Open a database connection.
	function openDatabaseConnection($db_host, $db_username, $db_password, $db_name)
	{
		// Connect to the database host
		$db_connection = mysql_connect($db_host, $db_username, $db_password) or die("Could not connect to database ".$db_name." on host ".$db_host. ".");

		// Set the database to use
		mysql_select_db($db_name, $db_connection);

		return $db_connection;
	}

	// Close a database connection.
	function closeDatabaseConnection($db_connection)
	{
		mysql_close($db_connection);
	}
?>
