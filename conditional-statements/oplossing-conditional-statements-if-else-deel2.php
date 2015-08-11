<?php
	$opgegevenSeconden = 221108521;
	
	$minuut = 60;
	$uur = 60 * $minuut;
	$dag = 24 * $uur;
	$week = 7 * $dag;
	$maand = 31 * $dag;
	$jaar = 365 * $dag;
	
	
	$opgegevenJaar = floor($opgegevenSeconden / $jaar);
	$opgegevenMaand = floor($opgegevenSeconden / $maand);
	$opgegevenWeek = floor($opgegevenSeconden / $week);
	$opgegevenDag = floor($opgegevenSeconden / $dag);
	$opgegevenUur = floor($opgegevenSeconden / $uur);
	$opgegevenMinuut = floor($opgegevenSeconden / $minuut);
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>conditional statements if else: deel 2</title>
	</head>

	<body>
		<h1>conditional statements if else: deel 2</h1>
		
		<p>In <?= $opgegevenSeconden ?> zitten 
			<ul>
				<li> <?= $opgegevenJaar?> jaren</li>
				<li> <?= $opgegevenMaand ?> maanden</li>
				<li> <?= $opgegevenWeek ?> weken</li>
				<li> <?= $opgegevenDag ?> dagen</li>
				<li> <?= $opgegevenUur ?> uren</li>
				<li> <?= $opgegevenMinuut ?> minuten</li>
			</ul>
		</p>

	</body>
</html>