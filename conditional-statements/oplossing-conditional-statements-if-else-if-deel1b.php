<?php
	$getal = rand(0,100);
	$tiental1 = floor($getal/10)*10;
	$tiental2 = $tiental1 + 10;
	
	$boodschap = 'Het getal ligt tussen ' . $tiental1 .' en '. $tiental2;
	$reverseBoodschap = strrev($boodschap)
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>conditional statements if else if: deel 1</title>
	</head>

	<body>
		<h1>conditional statements if else if: deel 1</h1>
		
		<p>Het getal is <?=  $getal ?> en de boodschap luidt <?= $boodschap ?></p>
		<p>Men zou ook de omgekeerde boodschap kunnen geven : ' <?= $reverseBoodschap?>'</p>

	</body>
</html>