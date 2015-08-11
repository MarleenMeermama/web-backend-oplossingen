<?php
	$getal = 45;
	$boodschap = "";
	
	if ($getal < 10)
		{$boodschap = 'Het getal ligt tussen 0 en 10 (excl.)';}
	else if ($getal < 20)
		{$boodschap = 'Het getal ligt tussen 10 en 20 (excl.)';}
	else if ($getal < 30)
		{$boodschap = 'Het getal ligt tussen 20 en 30 (excl.)';}
	else if ($getal < 40)
		{$boodschap = 'Het getal ligt tussen 30 en 40 (excl.)';}
	else if ($getal < 50)
		{$boodschap = 'Het getal ligt tussen 40 en 50 (excl.)';}
	else if ($getal < 60)
		{$boodschap = 'Het getal ligt tussen 50 en 60 (excl.)';}
	else if ($getal < 70)
		{$boodschap = 'Het getal ligt tussen 60 en 70 (excl.)';}
	else if ($getal < 80)
		{$boodschap = 'Het getal ligt tussen 70 en 80 (excl.)';}
	else if ($getal < 90)
		{$boodschap = 'Het getal ligt tussen 80 en 90 (excl.)';}
	else 
		{$boodschap = 'Het getal ligt tussen 90 en 100';}
	
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