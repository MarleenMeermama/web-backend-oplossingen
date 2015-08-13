<?php

$dieren			=	array('hond', 'kat', 'schaap', 'kip', 'ezel', 'mus', 'varken', 'duif', 'muis', 'leeuw');
$aantal			=	count($dieren);
$teZoekenDier	=	'hond';
$gevonden		=	in_array($teZoekenDier, $dieren);

sort($dieren);




	
// 	•Zorg ervoor dat de array volgens het alfabet gesorteerd wordt ( A -> Z )
// •Maak een array $zoogdieren en plaats hier 3 dieren in, voeg vervolgens de 2 arrays met dieren samen in de array $dierenLijst
		

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>opdracht arrays functies - deel 2</title>
	</head>
	<body>
		<h1>opdracht arrays functies-deel2</h1>
		<p>In de array <code>$dieren</code> zitten <?php echo $aantal ?> dierennamen.</p>
		<p>Het dier '<?php echo $teZoekenDier ?>'' zit <?php ($gevonden)?'':'niet'?> in de dierenverzameling. </p>

		<p>De dierenverzameling in alfabetische volgorde is
			<?php foreach ($dieren as $key => $val) {
    			echo "dieren[" . $key . "] = " . $val . "\n";
			} ?>
		</p>

	</body>
</html>