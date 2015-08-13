<?php

$dierenArray1	=	array('hond', 'kat', 'schaap', 'kip', 'ezel', 'mus', 'varken', 'duif', 'muis', 'leeuw');
$aantal			=	count($dierenArray1);
$teZoekenDier	=	'hond';
$gevonden		=	in_array($teZoekenDier, $dierenArray1);
			

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>opdracht arrays functies - deel 1</title>
	</head>
	<body>
		<h1>opdracht arrays functies-deel1</h1>
		<p>In de array <code>$dierenArray1</code> zitten <?php echo $aantal ?> dierennamen.</p>
		<p>Het dier '<?php echo $teZoekenDier ?>'' zit <?php ($gevonden)?'':'niet'?> in de dierenverzameling. </p>

	</body>
</html>