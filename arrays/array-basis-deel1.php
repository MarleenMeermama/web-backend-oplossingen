<?php

$dierenArray1	=	array('hond', 'kat', 'schaap', 'kip', 'ezel', 'mus', 'varken', 'duif', 'muis', 'leeuw');
$dierenArray2	= 	array('hond'	=> 'blaffen', 
					'kat' => 'miauwen', 
					'schaap' => 'blaten', 
					'kip' => 'kakelen',
					'ezel' => 'balken', 
					'mus' => 'tsjielpen', 
					'varken' => 'knorren', 
					'duif' => 'koeren', 
					'muis' => 'piepen', 
					'leeuw' => 'brullen');
					
$voertuigen		= 	array(	'landvoertuigen' 	=> array('Vespa','fiets'), 
							'watervoertuigen' 	=> array('surfplank','vlot','schoener','driemaster'),
							'luchtvoertuigen' 	=> array('luchtballon','helicopter','B52')
						);					

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>opdracht arrays basis - deel 1</title>
	</head>
	<body>
		<h1>opdracht arrays basis-deel1</h1>
		<pre> <?php var_dump($dierenArray1) ?> </pre>
		<pre> <?php var_dump($dierenArray2) ?> </pre>
		<pre><?php var_dump($voertuigen) ?></pre>

	</body>
</html>