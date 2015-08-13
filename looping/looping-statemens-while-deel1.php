<?php 

$getallen = array();
$getallen2 = array();
$teller = 0;
$teller2 = 0;

while ( $teller <= 100) {
	$getallen[$teller] = $teller;
	++$teller;
}

$getallenAsString = implode(",", $getallen);

while ( $teller2 <= 100) {
	if ($getallen[$teller2] % 3 == 0 && $getallen[$teller2] > 40 && $getallen[$teller2] < 80) {
		$getallen2[]=$getallen[$teller2];
	}
	++$teller2;
}

$getallenAsString2 = implode(",", $getallen2);
// •Op een volgende lijn druk je alle getallen af die deelbaar zijn door 3 én groter zijn dan 40 mààr kleiner zijn dan 80.
 ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>looping statements while deel1</title>
    <body>
        <h1>looping statements while deel1</h1>
        <p>De getallen van 0 tot 100 zijn <?php echo $getallenAsString ?>.</p>
        <p>Alle getallen die deelbaar zijn door 3 én groter zijn dan 40 mààr kleiner zijn dan 80 zijn <?php echo $getallenAsString2 ?>.</p>
    </body>
</html>