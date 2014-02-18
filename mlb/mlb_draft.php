<?php
	$page_title = "MLB Fantasy League Draft";

	include("../../lib/dbconnect.php");

	if ($mode == "draft")
	{
		$current_date = date("YYYY-MM-DD");
		$draft_player = mysql_query("
			UPDATE 
				mlb_draft
			SET
				drafted = 'Y',
				date_drafted = now(),
				team_owner = '$team_owner'
			WHERE
				player_id = $player_id
		") or die("Could not draft player ".$player_id);
	}

	switch ($view_type)
	{
		case "name":
			$player_list = mysql_query("
				SELECT
					*
				FROM
					mlb_draft
				WHERE
					drafted = 'N' AND
					player_name like '$choice%'
				ORDER BY
					player_name
			") or die("Could not fetch player list selected by name");
			break;

		case "position":
			$player_list = mysql_query("
				SELECT
					*
				FROM
					mlb_draft
				WHERE
					drafted = 'N' AND
					player_position = '$choice'
				ORDER BY
					player_name
			") or die("Could not fetch player list selected by position ".$choice);
			break;

		case "team":
			$player_list = mysql_query("
				SELECT
					*
				FROM
					mlb_draft
				WHERE
					drafted = 'N' AND
					player_team = '$choice'
				ORDER BY
					player_name
			") or die("Could not fetch player list selected by team");
			break;

		case "drafted":
			$player_list = mysql_query("
				SELECT
					*
				FROM
					mlb_draft
				WHERE
					drafted = 'Y'
				ORDER BY
					date_drafted DESC
			") or die("Could not fetch drafted player list");
			break;
	}
?>

<html>


<head>
	<title>MLB Fantasy League Draft</title>
</head>

<body bgcolor="#FFFFFF">

<h2 align="center"><?php print($page_title);?></h2>

<div align="center">
<form method="post" action="mlb_draft.php">
	<input type="hidden" name="view_type" value="position">
	<table>
		<tr>
			<td><strong>View Players by Position:</strong></td>
			<td>
				<select name="choice">
					<option value="1B"<?php if ($choice == "1B") { print("selected"); }?>>1st Base</option>
					<option value="2B"<?php if ($choice == "2B") { print("selected"); }?>>2nd Base</option>
					<option value="3B"<?php if ($choice == "3B") { print("selected"); }?>>3rd Base</option>
					<option value="C"<?php if ($choice == "C") { print("selected"); }?>>Catcher</option>
					<option value="CF"<?php if ($choice == "CF") { print("selected"); }?>>Center Field</option>
					<option value="DH"<?php if ($choice == "DH") { print("selected"); }?>>Designated Hitter</option>
					<option value="LF"<?php if ($choice == "LF") { print("selected"); }?>>Left Field</option>
					<option value="P"<?php if ($choice == "P") { print("selected"); }?>>Pitcher</option>
					<option value="PH"<?php if ($choice == "PH") { print("selected"); }?>>Pinch Hitter</option>
					<option value="PR"<?php if ($choice == "PR") { print("selected"); }?>>Pinch Runner</option>
					<option value="RF"<?php if ($choice == "RF") { print("selected"); }?>>Right Field</option>
					<option value="SS"<?php if ($choice == "SS") { print("selected"); }?>>Short Stop</option>
			</select>
			</td>
			<td>
				<input type="submit" value="Go!">
			</td>
		</tr>
</form>

<form method="post" action="mlb_draft.php">
	<input type="hidden" name="view_type" value="team">
		<tr>
			<td><strong>View Players by Team:</strong></td>
			<td>
				<select name="choice">
<option value="Anaheim Angels"<?php if ($choice == "Anaheim Angels") { print("selected"); }?>>Anaheim Angels</option>
<option value="Arizona Diamondbacks"<?php if ($choice == "Arizona Diamondbacks") { print("selected"); }?>>Arizona Diamondbacks</option>
<option value="Atlanta Braves"<?php if ($choice == "Atlanta Braves") { print("selected"); }?>>Atlanta Braves</option>
<option value="Baltimore Orioles"<?php if ($choice == "Baltimore Orioles") { print("selected"); }?>>Baltimore Orioles</option>
<option value="Boston Red Sox"<?php if ($choice == "Boston Red Sox") { print("selected"); }?>>Boston Red Sox</option>
<option value="Chicago Cubs"<?php if ($choice == "Chicago Cubs") { print("selected"); }?>>Chicago Cubs</option>
<option value="Chicago White Sox"<?php if ($choice == "Chicago White Sox") { print("selected"); }?>>Chicago White Sox</option>
<option value="Cincinnati Reds"<?php if ($choice == "Cincinnati Reds") { print("selected"); }?>>Cincinnati Reds</option>
<option value="Cleveland Indians"<?php if ($choice == "Cleveland Indians") { print("selected"); }?>>Cleveland Indians</option>
<option value="Colorado Rockies"<?php if ($choice == "Colorado Rockies") { print("selected"); }?>>Colorado Rockies</option>
<option value="Detroit Tigers"<?php if ($choice == "Detroit Tigers") { print("selected"); }?>>Detroit Tigers</option>
<option value="Florida Marlins"<?php if ($choice == "Florida Marlins") { print("selected"); }?>>Florida Marlins</option>
<option value="Houston Astros"<?php if ($choice == "Houston Astros") { print("selected"); }?>>Houston Astros</option>
<option value="Kansas City Royals"<?php if ($choice == "Kansas City Royals") { print("selected"); }?>>Kansas City Royals</option>
<option value="Los Angeles Dodgers"<?php if ($choice == "Los Angeles Dodgers") { print("selected"); }?>>Los Angeles Dodgers</option>
<option value="Milwaukee Brewers"<?php if ($choice == "Milwaukee Brewers") { print("selected"); }?>>Milwaukee Brewers</option>
<option value="Minnesota Twins "<?php if ($choice == "Minnesota Twins") { print("selected"); }?>>Minnesota Twins</option>
<option value="Montreal Expos"<?php if ($choice == "Montreal Expos ") { print("selected"); }?>>Montreal Expos </option>
<option value="New York Mets"<?php if ($choice == "New York Mets") { print("selected"); }?>>New York Mets</option>
<option value="New York Yankees"<?php if ($choice == "New York Yankees") { print("selected"); }?>>New York Yankees</option>
<option value="Oakland Athletics"<?php if ($choice == "Oakland Athletics") { print("selected"); }?>>Oakland Athletics</option>
<option value="Philadelphia Phillies"<?php if ($choice == "Philadelphia Phillies") { print("selected"); }?>>Philadelphia Phillies</option>
<option value="Pittsburgh Pirates"<?php if ($choice == "Pittsburgh Pirates") { print("selected"); }?>>Pittsburgh Pirates</option>
<option value="San Diego Padres"<?php if ($choice == "San Diego Padres") { print("selected"); }?>>San Diego Padres</option>
<option value="San Francisco Giants"<?php if ($choice == "San Francisco Giants") { print("selected"); }?>>San Francisco Giants</option>
<option value="Seattle Mariners"<?php if ($choice == "Seattle Mariners") { print("selected"); }?>>Seattle Mariners</option>
<option value="St. Louis Cardinals"<?php if ($choice == "St. Louis Cardinals") { print("selected"); }?>>St. Louis Cardinals</option>
<option value="Tampa Bay Devil Rays"<?php if ($choice == "Tampa Bay Devil Rays") { print("selected"); }?>>Tampa Bay Devil Rays</option>
<option value="Texas Rangers"<?php if ($choice == "Texas Rangers") { print("selected"); }?>>Texas Rangers</option>
<option value="Toronto Blue Jays"<?php if ($choice == "Toronto Blue Jays") { print("selected"); }?>>Toronto Blue Jays</option>
				</select>
			</td>
			<td>
				<input type="submit" value="Go!">
			</td>
		</tr>
</form>

<form method="post" action="mlb_draft.php">
	<input type="hidden" name="view_type" value="name">
		<tr>
			<td><strong>View Players by Last Name:</strong></td>
			<td>
				<select name="choice">
					<option value="A"<?php if ($choice == "A") { print("selected"); }?>>A</option>
					<option value="B"<?php if ($choice == "B") { print("selected"); }?>>B</option>
					<option value="C"<?php if ($choice == "C") { print("selected"); }?>>C</option>
					<option value="D"<?php if ($choice == "D") { print("selected"); }?>>D</option>
					<option value="E"<?php if ($choice == "E") { print("selected"); }?>>E</option>
					<option value="F"<?php if ($choice == "F") { print("selected"); }?>>F</option>
					<option value="G"<?php if ($choice == "G") { print("selected"); }?>>G</option>
					<option value="H"<?php if ($choice == "H") { print("selected"); }?>>H</option>
					<option value="I"<?php if ($choice == "I") { print("selected"); }?>>I</option>
					<option value="J"<?php if ($choice == "J") { print("selected"); }?>>J</option>
					<option value="K"<?php if ($choice == "K") { print("selected"); }?>>K</option>
					<option value="L"<?php if ($choice == "L") { print("selected"); }?>>L</option>
					<option value="M"<?php if ($choice == "M") { print("selected"); }?>>M</option>
					<option value="N"<?php if ($choice == "N") { print("selected"); }?>>N</option>
					<option value="O"<?php if ($choice == "O") { print("selected"); }?>>O</option>
					<option value="P"<?php if ($choice == "P") { print("selected"); }?>>P</option>
					<option value="Q"<?php if ($choice == "Q") { print("selected"); }?>>Q</option>
					<option value="R"<?php if ($choice == "R") { print("selected"); }?>>R</option>
					<option value="S"<?php if ($choice == "S") { print("selected"); }?>>S</option>
					<option value="T"<?php if ($choice == "T") { print("selected"); }?>>T</option>
					<option value="U"<?php if ($choice == "U") { print("selected"); }?>>U</option>
					<option value="V"<?php if ($choice == "V") { print("selected"); }?>>V</option>
					<option value="W"<?php if ($choice == "W") { print("selected"); }?>>W</option>
					<option value="X"<?php if ($choice == "X") { print("selected"); }?>>X</option>
					<option value="Y"<?php if ($choice == "Y") { print("selected"); }?>>Y</option>
					<option value="Z"<?php if ($choice == "Z") { print("selected"); }?>>Z</option>
				</select>
			</td>
			<td>
				<input type="submit" value="Go!">
			</td>
		</tr>
</form>
		<tr>
			<td colspan="3" align="center"><a href="mlb_draft.php?view_type=drafted">View Drafted Players</a></td>
		</tr>
	</table>
</div>

<?php
	switch ($view_type)
	{
		case "":
?>
		<h4 align="center">Please select your view</h4>
<?php
			break;
		default:
?>
		<div align="center">
			<table border="1" width="50%">
				<tr>
<?php
			if ($view_type == "drafted")
			{
?>
					<th>Team Owner</th>
					<th>Date Drafted</th>
<?php
			}

			else
			{
?>
					<th>&nbsp;</th>
<?php
			}
?>
					<th>Name</th>
					<th>Position</th>
					<th>Team</th>
				</tr>
<?php
			$count = 0;

			while ($current_row = mysql_fetch_array($player_list))
			{
				$player_id = $current_row["player_id"];
				$player_name = $current_row["player_name"];
				$player_position = $current_row["player_position"];
				$player_team = $current_row["player_team"];
				$date_drafted = $current_row["date_drafted"];
				$team_owner = $current_row["team_owner"];
?>
				<tr <?php if ($count == 0 && $view_type == "drafted") { print("bgcolor=\"#b9daf5\""); } $count++; ?>>
<?php
				if ($view_type == "drafted")
				{
?>
					<td><?php print($team_owner); ?></td>
					<td><?php print($date_drafted); ?></td>
<?php
				}

				else
				{
?>
					<td align="center"><a href="mlb_draft_confirm.php?view_type=<?php print($view_type); ?>&choice=<?php print($choice); ?>&player_id=<?php print($player_id); ?>">Draft</a></td>
<?php
				}
?>
					<td><?php print($player_name); ?></td>
					<td align="center"><?php print($player_position); ?></td>
					<td><?php print($player_team); ?></td>
				</tr>
<?php
			}
?>
			</table>
		</div>
<?php
	}
?>

</body>

</html>

<?php
	include("../../lib/dbdisconnect.php");
?>