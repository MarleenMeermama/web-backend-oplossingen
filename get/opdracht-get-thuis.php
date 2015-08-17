<?php 

$artikels = array(

						array ('titel' => 'Apple, Facebook, eBay, Amazon, Google,... zijn zo racistisch als het...',
								'datum' => '17/08/2015',
								'inhoud' => 'De 20 belangrijkste bedrijven in Silicon Valley hebben in totaal 189 bestuursleden: 36 daarvan zijn blanke vrouwen, dan zijn er nog 3 zwarte mannen en 1 Latino.
								Apple, Facebook, eBay, Amazon, Google etc. hebben de beste imago’s en worden geleid door fijne, ‘coole’ kerels, die sokken, noch dassen dragen. In werkelijkheid zijn ze zo racistisch als het maar kan zijn.’',
								'afbeelding' => 'computerwereld.jpg',
								'afbeeldingBeschrijving' => 'foto van ...',
								),
						array ('titel' => 'Het is tot dinsdag wachten op zomerweer',
								'datum' => '17/08/2015',
								'inhoud' => 'Vandaag is het droog met zon en wolkenvelden die elkaar afwisselen. Enkel over het oosten van het land is er in de namiddag veel bewolking waaruit soms nog wat lichte regen kan vallen. Aan de kust zijn er flinke perioden met zon.
								De wind waait zwak tot matig uit noordelijke richtingen. De maximumtemperaturen schommelen tussen 14 graden in de Ardennen en ongeveer 20 graden elders. In de loop van de avond en nacht blijft het enige tijd droog, met opklaringen in het westen. Over het oosten kan er later wat lichte regen vallen. De minima gaan van 9 tot 13 graden.
								Morgen is er veel bewolking over het noordoosten van het land. Uit die bewolking kan tijdelijk wat lichte regen vallen. In de andere streken is het droog met af en toe zon. De wind komt uit het noordwesten en waait zwak tot matig. De temperaturen gaan tot 14 graden in Hoog België en 18 à 19 graden elders. 
								Vanaf dinsdag herstelt het zomerweer zich. Tot zaterdag blijft het overwegend droog met geleidelijk meer zon. De middagtemperatuur stijgt van zowat 21 graden dinsdag naar 25 graden of nog iets meer in de tweede helft van de week.
',
								'afbeelding' => 'zomer.jpg',
								'afbeeldingBeschrijving' => 'strandcabine',
								),
						array ('titel' => 'Verjaardagsfeestjes Zoo',
								'datum' => '17/08/2015',
								'inhoud' => 'Ben je binnenkort jarig? Kom dan een feestje bouwen in de ZOO! Leeuw Nestor, olifantenrakkers Kanvar en Ming Jung en stoere gorilla Kumba  feesten maar al te graag met je mee. Bovendien komt het feestvarken er helemaal gratis in. Vergeet de feesthoedjes niet!
								Als je je verjaardag komt vieren in de ZOO, trakteren onze dieren jou en je vrienden op pannenkoeken en een drankje. Wist je trouwens dat onze olifanten wel 15 pannenkoeken eten in één hap? Benieuwd of jij dat ook kan…',
								'afbeelding' => 'stokstaartje.jpg',
								'afbeeldingBeschrijving' => 'stokstaartje',
								)
						);


$enkelArtikel = false;
$bestaatNiet = false;


if(isset($_GET['id'])){
	
	$id = $_GET['id'];
	if(array_key_exists($id, $artikels)){
		$enkelArtikel = true;
		$artikel = $artikels[$id];
	}else{
		$bestaatNiet = true;
	}
	
}


?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<style>
			body
			{
				background: grey;
				color:white;
			}

			.container
			{
				width:	1024px;
				margin:	0 auto;
				float:none;
			}

			img
			{
				max-width: 100%;
			}

			.multiple
			{
				float:left;
				width:300px;
				margin:10px;
				padding:10px;
				display: block;
				background-color:black;
			}
			.single
			{
				float:left;
				width:900px;
			}
			
		</style>

    	<title>opdracht get</title>
	
    </head>
    <body>
    	<div class = 'container'>
    	
			<?php if ($bestaatNiet): ?>
				<h1>Dit artikel bestaat niet</h1>

			<?php elseif ($enkelArtikel): ?>
				<h1>Enkel artikel</h1>
					<article class = "single">
			    		<h2><?= $artikel['titel']?></h2>
			    		<p><?= $artikel['datum'] ?></p>
			    		<img src = "img/<?= $artikel['afbeelding']?>" alt = <?= $artikel['afbeeldingBeschrijving'] ?>>
		    			<p>	<?php echo $artikel['inhoud'] ?></p>
    				</article>
			
			
			<?php else: ?>
				<h1>De krant van vandaag</h1>
				<?php foreach ($artikels as $id => $artikel): ?>
	    			<article class = "multiple">
			    		<h2><?= $artikel['titel']?></h2>
			    		<p><?= $artikel['datum'] ?></p>
			    		<img src = "img/<?= $artikel['afbeelding']?>" alt = <?= $artikel['afbeeldingBeschrijving'] ?>>
		    			<p>
		    				<?php echo substr($artikel['inhoud'], 0,50 )  ?> ...
		    				<a href="opdracht-get-thuis.php?id=<?= $id ?>">lees meer</a>
		    			</p>
    				</article>
    			<?php endforeach ?>
			<?php endif ?>

    	</div>
		
 
     </body>
</html>