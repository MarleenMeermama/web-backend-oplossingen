<?php

$dieren			=	array('hond', 'kat', 'schaap', 'kip', 'ezel', 'mus', 'varken', 'duif', 'muis', 'leeuw');
$aantal			=	count($dieren);
$teZoekenDier	=	'hond';
$gevonden		=	in_array($teZoekenDier, $dieren);
$zoogdieren		=	array('beer','tijger','rat');
$dierenLijst	=	array_merge($dieren,$zoogdieren);

$dierenAsString				= "";
$gesorteerdeDierenAsString 	= "";
$dierenlijstAsString		= "";
$zoogdierenAsString			= "";

foreach ($dieren as $key => $value) {
	$dierenAsString .= $value . ",";
}

sort($dieren);
foreach ($dieren as $key => $value) {
	$gesorteerdeDierenAsString .= $value . ",";
}

foreach ($zoogdieren as $key => $value) {
	$zoogdierenAsString .= $value . ",";
}

foreach ($dierenLijst as $key => $value) {
	$dierenlijstAsString .= $value . ",";
}

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
		<p>Het dier '<?php echo $teZoekenDier ?>'' zit <?php echo ($gevonden)?'':'niet'?> in de dierenverzameling: <?php echo $dierenAsString ?>. </p>

		<p>De dierenverzameling: <?php echo $dierenAsString ?> in alfabetische volgorde is : <?php echo $gesorteerdeDierenAsString ?>. </p>

		<p> Als je "<?php echo $zoogdierenAsString ?>" en "<?php echo $gesorteerdeDierenAsString ?>" samenvoegt, krijg je "<?php echo $dierenlijstAsString ?>" </p>

	</body>
</html>