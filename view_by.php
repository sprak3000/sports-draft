		<div align="center">
			<form method="post" action="position.php">
				<table class="views">
					<tr>
						<th class="views" colspan="3">View Players by</th>
					</tr>
					<tr>
						<td class="views_bold" align="right">Position:</td>
						<td class="views">
							<select name="position">
							<?php
								$db_connection = openDatabaseConnection($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
								$positions_query = mysql_query(
									"SELECT * FROM ".$TABLE_PREFIX."_position"
								) or die("Could not retrieve position data from host ".$DB_HOST." using database ".$DB_NAME.".");

								while($current_position_row = mysql_fetch_array($positions_query))
								{
									$position_id = $current_position_row[$TABLE_PREFIX."_position_id"];
									$position_name = $current_position_row["position"];
							?>
								<option value="<?php print($position_id);?>"<?php if ($position == "$position_id") { print(" selected"); }?>><?php print($position_name);?></option>
							<?php
								}

								closeDatabaseConnection($db_connection);
							?>
							</select>
						</td>
						<td class="views"><input type="submit" value="Go!"></td>
					</tr>
			</form>
			<form method="post" action="team.php">
					<tr>
						<td class="views_bold" align="right">Team:</td>
						<td class="views">
							<select name="team">
							<?php
								$db_connection = openDatabaseConnection($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
								$teams_query = mysql_query(
									"SELECT * FROM ".$TABLE_PREFIX."_team ORDER BY team_name"
								) or die("Could not retrieve team data from host ".$DB_HOST." using database ".$DB_NAME.".");

								while($current_position_row = mysql_fetch_array($teams_query))
								{
									$team_id = $current_position_row[$TABLE_PREFIX."_team_id"];
									$team_name = $current_position_row["team_name"];
							?>
								<option value="<?php print($team_id);?>"<?php if ($team == "$team_id") { print(" selected"); }?>><?php print($team_name);?></option>
							<?php
								}

								closeDatabaseConnection($db_connection);
							?>
							</select>
						</td>
						<td class="views"><input type="submit" value="Go!"></td>
					</tr>
			</form>
			<form method="post" action="last_name.php">
					<tr>
						<td class="views_bold" align="right">Last Name Starting with:</td>
						<td class="views">
							<select name="initial">
								<option value="A"<?php if ($initial == "A") { print("selected"); }?>>A</option>
								<option value="B"<?php if ($initial == "B") { print("selected"); }?>>B</option>
								<option value="C"<?php if ($initial == "C") { print("selected"); }?>>C</option>
								<option value="D"<?php if ($initial == "D") { print("selected"); }?>>D</option>
								<option value="E"<?php if ($initial == "E") { print("selected"); }?>>E</option>
								<option value="F"<?php if ($initial == "F") { print("selected"); }?>>F</option>
								<option value="G"<?php if ($initial == "G") { print("selected"); }?>>G</option>
								<option value="H"<?php if ($initial == "H") { print("selected"); }?>>H</option>
								<option value="I"<?php if ($initial == "I") { print("selected"); }?>>I</option>
								<option value="J"<?php if ($initial == "J") { print("selected"); }?>>J</option>
								<option value="K"<?php if ($initial == "K") { print("selected"); }?>>K</option>
								<option value="L"<?php if ($initial == "L") { print("selected"); }?>>L</option>
								<option value="M"<?php if ($initial == "M") { print("selected"); }?>>M</option>
								<option value="N"<?php if ($initial == "N") { print("selected"); }?>>N</option>
								<option value="O"<?php if ($initial == "O") { print("selected"); }?>>O</option>
								<option value="P"<?php if ($initial == "P") { print("selected"); }?>>P</option>
								<option value="Q"<?php if ($initial == "Q") { print("selected"); }?>>Q</option>
								<option value="R"<?php if ($initial == "R") { print("selected"); }?>>R</option>
								<option value="S"<?php if ($initial == "S") { print("selected"); }?>>S</option>
								<option value="T"<?php if ($initial == "T") { print("selected"); }?>>T</option>
								<option value="U"<?php if ($initial == "U") { print("selected"); }?>>U</option>
								<option value="V"<?php if ($initial == "V") { print("selected"); }?>>V</option>
								<option value="W"<?php if ($initial == "W") { print("selected"); }?>>W</option>
								<option value="X"<?php if ($initial == "X") { print("selected"); }?>>X</option>
								<option value="Y"<?php if ($initial == "Y") { print("selected"); }?>>Y</option>
								<option value="Z"<?php if ($initial == "Z") { print("selected"); }?>>Z</option>
							</select>
						</td>
						<td class="views"><input type="submit" value="Go!"></td>
					</tr>
					<tr>
						<th class="views_bottom" colspan="3"><a href="drafted.php">View Drafted Players</a></th>
					</tr>
				</table>
			</form>
		</div>
