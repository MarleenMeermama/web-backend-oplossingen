<?php
    $voornaam = 'Marleen';
	$naam = 'Meermans';
	$volledigeNaam = $voornaam.' '.$naam;
	$aantalKarakters = strlen($volledigeNaam);
?>

<!DOCTYPE html>
<html>
<head>opdracht string concatenate</head>
<body>

    <h1>string concatenate</h1>
	<p>Volledige naam is <?php echo $volledigeNaam ?></p>
	<p>Aantal karakters van de volledige naam is <?php echo $aantalKarakters ?>.</p>

</body>
</html>