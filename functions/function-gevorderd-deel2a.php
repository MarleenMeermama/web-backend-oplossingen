<?php  
$pigHealth = 5;
$maximumThrows = 8;

function calculateHit(){
	global $pigHealth;
	$boodschap	=	'';
	$raakkans 	= 	rand(0,100);
	$raak 		=  ( $raakkans <= 40 ) ? true : false;
	if($raak){
		--$pigHealth;
		if($pigHealth == 1){
			$boodschap = "Raak! Er is nog maar " . $pigHealth. " varken over.";
		}else{
			$boodschap = "Raak! Er zijn nog maar " . $pigHealth. " varkens over.";
		}	
	}
	else{
		($pigHealth == 1)?($boodschap = 'Mis! Nog '.$pigHealth. ' varken in het team.'):($boodschap = 'Mis! Nog '.$pigHealth. ' varkens in het team.');
	}
	return $boodschap;
}

function launchAngryBird($container = array()){
	global $maximumThrows;
	global $pigHealth;
	static $teller = 0;
	
	if(($teller < $maximumThrows)&&($pigHealth > 0)){
		++$teller;
		$container[$teller] = calculateHit();
		return launchAngryBird($container);
	}
	if (($pigHealth == 0)||($teller == $maximumThrows)){
		++$teller;
		$container[$teller] = --$teller.'keer gespeeld, aantal varkens = ' . $pigHealth . '. Verloren!';
	}else{
		$container[$teller] = 'Gewonnen';
	}
	return $container;
}

$resultaat = launchAngryBird();

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>function gevorderd deel 2</title>
        
    </head>
    <body>
		<h1>function gevorderd deel 2</h1>  
		<?php foreach ($resultaat as $value): ?>
			<p><?php echo $value ?></p>
		<?php endforeach ?>
    </body>
</html>