<?php
	function selectPlayersByTeam($tablePrefix, $team, $databaseHost, $databaseName)
	{
		$players_by_team_query = mysql_query("
			SELECT
				p.".$tablePrefix."_player_id AS player_id, last_name, first_name, age, height, weight, position, team_name
			FROM
				".$tablePrefix."_player p 
					LEFT JOIN ".$tablePrefix."_draft_pick dp 
						ON p.".$tablePrefix."_player_id = dp.".$tablePrefix."_player_id,
				".$tablePrefix."_team t,
				".$tablePrefix."_position pos
			WHERE
				dp.".$tablePrefix."_player_id IS NULL AND
				p.".$tablePrefix."_team_id = $team AND
				p.".$tablePrefix."_team_id = t.".$tablePrefix."_team_id AND
				p.".$tablePrefix."_position_id = pos.".$tablePrefix."_position_id
			ORDER BY
				last_name
		") or die("Could not retrieve players based on team from database ".$databaseName." on host ".$databaseHost.".<br>SQL Error:<br>".mysql_error()."</body></html>");

		return $players_by_team_query;
	}

	function selectPlayersByPosition($tablePrefix, $position, $databaseHost, $databaseName)
	{
		$players_by_position_query = mysql_query("
			SELECT
				p.".$tablePrefix."_player_id AS player_id, last_name, first_name, age, height, weight, position, team_name
			FROM
				".$tablePrefix."_player p 
					LEFT JOIN ".$tablePrefix."_draft_pick dp 
						ON p.".$tablePrefix."_player_id = dp.".$tablePrefix."_player_id,
				".$tablePrefix."_position pos,
				".$tablePrefix."_team t
			WHERE
				dp.".$tablePrefix."_player_id IS NULL AND
				p.".$tablePrefix."_position_id = $position AND
				p.".$tablePrefix."_position_id = pos.".$tablePrefix."_position_id AND
				p.".$tablePrefix."_team_id = t.".$tablePrefix."_team_id
			ORDER BY
				last_name
		") or die("Could not retrieve players based on position from database ".$databaseName." on host ".$databaseHost.".<br>SQL Error:<br>".mysql_error()."</body></html>");

		return $players_by_position_query;
	}

	function selectPlayersByLastName($tablePrefix, $initial, $databaseHost, $databaseName)
	{
		$players_by_last_name_query = mysql_query("
			SELECT
				p.".$tablePrefix."_player_id AS player_id, last_name, first_name, age, height, weight, position, team_name
			FROM
				".$tablePrefix."_player p 
					LEFT JOIN ".$tablePrefix."_draft_pick dp 
						ON p.".$tablePrefix."_player_id = dp.".$tablePrefix."_player_id,
				".$tablePrefix."_position pos,
				".$tablePrefix."_team t
			WHERE
				dp.".$tablePrefix."_player_id IS NULL AND
				last_name LIKE '$initial%' AND
				p.".$tablePrefix."_position_id = pos.".$tablePrefix."_position_id AND
				p.".$tablePrefix."_team_id = t.".$tablePrefix."_team_id
			ORDER BY
				last_name
		") or die("Could not retrieve players based on last name starting with ".$initial." from database ".$databaseName." on host ".$databaseHost.".<br>SQL Error:<br>".mysql_error()."</body></html>");

		return $players_by_last_name_query;
	}
?>
