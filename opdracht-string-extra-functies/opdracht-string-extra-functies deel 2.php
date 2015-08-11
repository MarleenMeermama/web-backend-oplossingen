<?php
    $fruit = 'ananas';
	$needle = 'a';
	$position = strrpos($fruit, $needle);
	$uppercase = strtoupper($fruit);
?>

<!DOCTYPE html>
<html>
<head>opdracht string extra functies - deel 2</head>
<body>

    <h1>string extra functies - deel 2</h1>
	<p>De positie van de laatste \'a\' in <?php echo $fruit ?> is <?php echo $position ?></p>
	<p>In hoofdletters geeft dit <?php echo $uppercase ?></p>

</body>
</html>
