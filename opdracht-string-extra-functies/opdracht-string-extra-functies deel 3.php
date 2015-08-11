<?php
   $lettertje ='e';
   $cijfertje = 3;
   $langsteWoord = 'zandzeepsodemineralenwatersteenstralen';
   $vervangLetterDoorCijfer = str_replace($lettertje,$cijfertje,$langsteWoord);
?>

<!DOCTYPE html>
<html>
<head>opdracht string extra functies - deel 3</head>
<body>

    <h1>string extra functies - deel 3</h1>
	<p>Als je <?= $lettertje ?> vervangt door <?= $cijfertje ?> in <?= $langsteWoord ?> dan krijg je <?= $vervangLetterDoorCijfer ?>. </p>
	

</body>
</html>
