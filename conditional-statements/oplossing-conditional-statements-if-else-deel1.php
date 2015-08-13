<?php

	$jaar			=	2000;
	$schrikkeljaar	=	"";
	
	if ((($jaar % 4 == 0) && ($jaar % 100 != 0)) || ($jaar % 400 == 0))
	{$schrikkeljaar = "een schrikkeljaar";}
	else
	{$schrikkeljaar = "geen schrikkeljaar";}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>conditional statements if else: deel 1</title>
	</head>

	<body>
		<h1>conditional statements if else: deel 1</h1>
		<p>Het jaar is <?= $jaar ?> is <?= $schrikkeljaar ?></p>

	</body>
</html>