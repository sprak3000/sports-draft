<?php
	function isValidUser($tablePrefix, $userName, $password, $databaseHost, $databaseName)
	{
		$user_info_query = mysql_query("
			SELECT
				".$tablePrefix."_team_owner_id, username, password
			FROM
				".$tablePrefix."_team_owner
			WHERE
				username = '".$userName."' AND
				password = '".$password."'
		") or die("Could not retrieve user login information from ".$databaseName." on host ".$databaseHost.".<br>SQL Error:<br>".mysql_error()."</body></html>");

		if (mysql_num_rows($user_info_query) == 1)
		{
			return true;
		}

		return false;
	}
?>
