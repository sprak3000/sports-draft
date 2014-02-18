<?php
	$page_title = "MLB Fantasy League Draft - Confirm your selection";

	include("../../lib/dbconnect.php");

	$player = mysql_query("
		SELECT
			player_name
		FROM
			mlb_draft
		WHERE
			player_id = $player_id
	") or die("Could not fetch player");

	while ($current_row = mysql_fetch_array($player))
	{
		$player_name = $current_row["player_name"];
	}
?>

<html>


<head>
	<title><?php print($page_title);?></title>

	<script lanaguage="JavaScript">
		<!--
			function stripSpaces(x)
			{
    				while (x.substring(0,1) == ' ') 
				{
					x = x.substring(1);
    				}

				return x;
			}

			function empty(x)
			{ 
				if (x.length > 0) 
				{
					return false;
				}

				else
				{
					 return true;
				}
			}

		// -->
	</script>

	<script language="JavaScript1.2">
		<!--

			function stripSpaces(x)
			{ 
				return x.replace(/^\W+/,''); 
			}
		// -->
	</script>

	<script language="JavaScript">
		<!--
			function validateUserName()
			{
				var userName = document.draftForm.team_owner.value;

				if (empty(stripSpaces(userName)))
				{
					alert("Please enter your name.");
					return false;
				}

				return true;
			}
		// -->
	</script>
</head>

<body bgcolor="#FFFFFF">

<h2 align="center"><?php print($page_title);?></h2>

<form name="draftForm" method="post" action="mlb_draft.php" onSubmit="return validateUserName();">
	<input type="hidden" name="mode" value="draft">
	<input type="hidden" name="player_id" value="<?php print($player_id); ?>">
	<input type="hidden" name="view_type" value="drafted">

	<div align="center">
		<table>
			<tr>
				<td><strong>Who are you?</strong></td>
				<td><input type="text" name="team_owner" value="<?php print($team_owner); ?>" size="25" maxlength="50"></td>
			</tr>
			<tr>
				<td colspan="2">Do you wish to draft <?php print($player_name); ?></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="Yes"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><a href="mlb_draft.php?view_type=<?php print($view_type); ?>&choice=<?php print($choice); ?>">No, I am a sieve and selected the wrong player</a></td>
		</table>
	</div>
</form>

</body>

</html>

<?php
	include("../../lib/dbdisconnect.php");
?>
