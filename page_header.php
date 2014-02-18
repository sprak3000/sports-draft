<?php
	include("config/preferences.php");
	include("lib/database.php");
	include("lib/query.php");
	include("lib/display.php");
?>

<html>
	<head>
		<title><?php print($TITLE_OF_DRAFT);?></title>
		<link rel="stylesheet" href="<?php print($STYLE_SHEET);?>" type="text/css" />
	</head>

	<body>
		<h2 align="center"><?php print($TITLE_OF_DRAFT);?></h2>
