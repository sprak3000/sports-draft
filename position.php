<?php
	include("page_header.php");
	include("view_by.php");

	$db_connection = openDatabaseConnection($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

	displayPlayerTable(selectPlayersByPosition($TABLE_PREFIX, $position, $DB_HOST, $DB_NAME), "Position");

	closeDatabaseConnection($db_connection);

	include("page_footer.php");
?>
