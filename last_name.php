<?php
	include("page_header.php");
	include("view_by.php");

	$db_connection = openDatabaseConnection($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

	displayPlayerTable(selectPlayersByLastName($TABLE_PREFIX, $initial, $DB_HOST, $DB_NAME), "Last Name");

	closeDatabaseConnection($db_connection);

	include("page_footer.php");
?>
