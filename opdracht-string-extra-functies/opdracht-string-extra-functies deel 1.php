<?php
    $fruit = 'kokosnot';
	$lengte = strlen($fruit);
	$needle = 'o';
	$position = strpos($fruit, $needle);
?>

<!DOCTYPE html>
<html>
<head>opdracht string extra functies - deel 1</head>
<body>

    <h1>string extra functies - deel 1</h1>
	<p>De lengte van het woord <?php echo $fruit ?> is <?php echo $lengte ?>.</p>
	<p>De positie van de eerste \'o\' in de variabele <?php echo $fruit ?> is <?php echo $position ?></p>

</body>
</html>
