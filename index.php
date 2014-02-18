<?php
	include("page_header.php");

	$db_connection = openDatabaseConnection($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

	$admin_message_query = mysql_query("
		SELECT
			draft_message
		FROM
			draft_admin
		WHERE
			draft_type = '".$TABLE_PREFIX."'"
	) or die("Unable to fetch draft message from database ".$DB_NAME." on host ".$DB_HOST.".<br>SQL Error:<br>".mysql_error()."</body></html>");

	while ($current_row = mysql_fetch_array($admin_message_query))
	{
		$admin_message = $current_row["draft_message"];
	}

	closeDatabaseConnection($db_connection);
?>
	<div align="center">
		<table class="views" width="60%">
			<caption>Important News</caption>
			<tr>
				<td class="views"><?php print($admin_message);?></td>
			</tr>
		</table>

		<p>
		<form method="post" action="login.php">
			<table class="views" width="40%">
				<caption>Login</caption>
				<tr>
					<td class="views_bold" align="right">Username:</td>
					<td class="views"><input type="text" name="userName" value="<?php print($userName);?>" size="20" maxlength="20"></td>
				</tr>
				<tr>
					<td class="views_bold" align="right">Password:</td>
					<td class="views"><input type="password" name="password" value="<?php print($password);?>" size="20" maxlength="20"></td>
				</tr>
				<tr>
					<td class="views" colspan="2" align="center"><input type="submit" value="Go!"></td>
				</tr>
				<tr>
					<th class="views_bottom" colspan="2" align="center"><a href="">Sign up</a></th>
				</tr>
			</table>
		</form>
		</p>
	</div>
<?php
	include("page_footer.php");
?>
