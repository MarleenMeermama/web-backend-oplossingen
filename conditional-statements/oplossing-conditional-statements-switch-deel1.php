<?php

	$getal = 1;
	switch ( $getal ) 
	{
	
		case 1:
			$weekdag = "maandag";
			break;

		case 2:
			$weekdag = "dinsdag";
			break;

		case 3:
			$weekdag = "woensdag";
			break;
			
		case 4:
			$weekdag = "donderdag";
			break;	
			
		case 5:
			$weekdag = "vrijdag";
			break;
	
		case 6:
			$weekdag = "zaterdag";
			break;
	
		case 7:
			$weekdag = "zondag";
			break;
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>conditional statements: deel 1</title>
	</head>

	<body>
		<h1>conditional statements: deel 1</h1>
		<p>De dag die bij <?= $getal ?> hoort is <?= $weekdag ?></p>


	</body>
</html>