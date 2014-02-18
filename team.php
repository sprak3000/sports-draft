<?php
	include("page_header.php");
	include("view_by.php");

	$db_connection = openDatabaseConnection($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

	displayPlayerTable(selectPlayersByTeam($TABLE_PREFIX, $team, $DB_HOST, $DB_NAME), "Team");

	closeDatabaseConnection($db_connection);

	include("page_footer.php");
?>
