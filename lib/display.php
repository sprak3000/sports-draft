<?php
	// Prints out the table of players.
	// $query_results - Variable containing the results of a mysql_query() call
	// $view_string - String variable indicating the player view type
	function displayPlayerTable($query_results, $view_string)
	{
?>
		<p>&nbsp;</p>
		<div align="center">
			<table class="listing">
				<caption>Players by <?php print($view_string);?></caption>
				<tr>
					<th class="listing">&nbsp;</th>
					<th class="listing">Player</th>
					<th class="listing">Position</th>
					<th class="listing">Team</th>
				</tr>
<?php
		while($current_player_row = mysql_fetch_array($query_results))
		{
			$player_id = $current_player_row["player_id"];
			$player_name = $current_player_row["last_name"].", ".$current_player_row["first_name"];
			$player_age = $current_player_row["age"];
			$player_height = $current_player_row["height"];
			$player_weight = $current_player_row["weight"]." lbs";
			$player_position = $current_player_row["position"];
			$player_team_name = $current_player_row["team_name"];
?>
				<tr>
					<td class="listing"><a href="draft.php?player_id=<?php print($player_id);?>">Draft</a></td>
					<td class="listing"><?php print($player_name);?><br>(Age:  <?php print($player_age);?>  Height:  <?php print($player_height);?>  Weight:  <?php print($player_weight);?>)</td>
					<td class="listing"><?php print($player_position);?></td>
					<td class="listing"><?php print($player_team_name);?></td>
				</tr>
<?php
		}
?>
			</table>
		</div>
<?php
	}
?>
