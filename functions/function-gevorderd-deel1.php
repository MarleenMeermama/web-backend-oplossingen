<?php  
$md5HashKey  = 'd1fa402db91a7a93c4f414b8278ce073';
$needle1 = '2';
$needle2 = '8';
$needle3 = 'a';


function functie1($needle){
	global $md5HashKey;
	$haystack = $md5HashKey;
	$totaal = strlen($haystack);
	$aantal = substr_count($haystack, $needle);
	$procent = round($aantal/$totaal*100,1);
	return $procent;
}

function functie2($haystack,$needle){
	$totaal = strlen($haystack);
	$aantal = substr_count($haystack, $needle);
	$procent = round($aantal/$totaal*100,1);
	return $procent;
};

function functie3($needle){
	global $md5HashKey;
	$totaal = strlen($md5HashKey);
	$aantal = substr_count($md5HashKey, $needle);
	$procent = round($aantal/$totaal*100,1);
	return $procent;
};

$resultaat1 = functie1($needle1);
$resultaat2 = functie2($md5HashKey, $needle2);
$resultaat3 = functie3($needle3);

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>function gevorderd deel 1</title>
        
    </head>
    <body>
		<h1>function gevorderd deel 1</h1>  
		<p>De needle <?php echo $needle1 ?> komt <?php echo $resultaat1 ?> % voor.</p>      
		<p>De needle <?php echo $needle2 ?> komt <?php echo $resultaat2 ?> % voor.</p>      
		<p>De needle <?php echo $needle3 ?> komt <?php echo $resultaat3 ?> % voor.</p>      
    </body>
</html>