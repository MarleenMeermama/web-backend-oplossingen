<?php  
$voertuigen = array( 'landvoertuigen'    => array('Vespa','fiets'), 
                            'watervoertuigen'   => array('surfplank','vlot','schoener','driemaster'),
                            'luchtvoertuigen'   => array('luchtballon','helicopter','B52')
                        );  
$testString = '<html><head><title></title></head><body>test</body></html>';

function drukArrayAf($array){
 	
    foreach ( $array as $key => $value){

        if (is_array($array[$key])){
            $containerArray[$key] = drukArrayAf($array[$key]);
            }
        else 
            {
                $containerArray[]    =   'voertuigen[' . $key . '] heeft waarde ' . $value;

            }
    }
    return $containerArray;
}

$resultaat = drukArrayAf($voertuigen);



function validateHtmlTag ($html){
	$startTag 	= 	'<html>';
	$endTag		=	'</html>';

	$valid 		=	FALSE;
	$lengteZonderEndTag	= strlen($html) - strlen($endTag);
	if (stripos($html, $startTag) === 0 ){
		if (strripos($html, $endTag) === $lengteZonderEndTag) {
			$valid = TRUE;
		}
	}
	return $valid;
}


?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>function basis deel2</title>
    </head>
    <body>
        <h1>function basis deel2</h1>

        <h2>Array afdrukken</h2>
       <?php  var_dump($resultaat) ?>
           

		<h2>Validatie html</h2>
		<p>De string <code> <?php echo $testString ?> </code> levert <?php echo (validateHtmlTag($testString)?'':'g') ?>een geldige html-code</p>

    </body>
</html>