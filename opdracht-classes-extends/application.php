<?php 

	function __autoload($varName){
		$filename = "classes/".$varName.".php";
		include_once($filename);
	}

	$dierKermit = new Animal('Kermit','mannelijk', '100');
	$dierDikkie = new Animal('Dikkie','mannelijk', '90');
	$dierFlipper = new Animal('Flipper','vrouwelijk', '80');

	$leeuw1 = new Lion('Simba', 'mannelijk', '100', 'Congo');
	$leeuw2 = new Lion('Scar', 'mannelijk', '60', 'Kenia');

	$zebra1 = new Zebra('Zeke','mannelijk','70','Quagga');
	$zebra2 = new Zebra('Zana','vrouwelijk','90','Selous');


// De speciale move van Zeke (soort: Quagga): walk

// De speciale move van Zana (soort: Selous): walk


 ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>opdracht classes extends</title>
	  	<link rel="stylesheet" href="http://web-backend.local/css/global.css">
	    <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
	    <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body>
        <h1>opdracht classes extends</h1>
       	<h2>Instanties van de Animal class</h2>
       	<p><?php echo $dierKermit->getName() ?> is van het geslacht <?php echo $dierKermit->getGender() ?>en heeft momenteel <?php echo $dierKermit->getHealth() ?> levenspunten.</p>
		<p>We verminderen de levenspunten met 10. Nieuw aantal levenspunten: <?php  echo $dierKermit->changeHealth(-10) ?></p>
       	<p>Een van zijn special moves zijn : <?php echo $dierKermit->doSpecialMove() ?></p>
       	<p><?php echo $dierDikkie->getName() ?> is van het geslacht <?php echo $dierDikkie->getGender() ?>en heeft momenteel <?php echo $dierDikkie->getHealth() ?> levenspunten.</p>
       	<p><?php echo $dierFlipper->getName() ?> is van het geslacht <?php echo $dierFlipper->getGender() ?>en heeft momenteel <?php echo $dierFlipper->getHealth() ?> levenspunten.</p>

       	<h2>Instanties van de Lion class</h2>
            	<p>De speciale move van <?php echo $leeuw1->getName() ?> (soort: <?php echo $leeuw1->getSpecies() ?>): <?php  echo $leeuw1->doSpecialMove()?></p>
            	<p>De speciale move van <?php echo $leeuw2->getName() ?> (soort: <?php echo $leeuw2->getSpecies() ?>): <?php  echo $leeuw2->doSpecialMove()?></p>

    	<h2>Instanties van de Zebra class</h2>
    		<p>De speciale move van <?php echo $zebra1->getName() ?> ( soort: <?php echo $zebra1->getSpecies() ?> ): <?php echo $zebra1->doSpecialMove() ?></p>
    		<p>De speciale move van <?php echo $zebra->getName() ?> ( soort: <?php echo $zebra->getSpecies() ?> ): <?php echo $zebra->doSpecialMove() ?></p>

    </body>
</html>