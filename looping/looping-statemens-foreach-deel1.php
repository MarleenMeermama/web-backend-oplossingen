<?php  


//teller voor het bijhouden van voorkomen letter
$tellerArray = array(); 

// inlezen tekst als string
$text  			= file_get_contents('text-file.txt');

// convert string to array (karakters)
$textChars 	=	str_split( $text  ); 

// sorteer van z naar a 
rsort($textChars );

//draai terug om
$gesorteerdeKraktersOmgekeerd = array_reverse( $textChars );

//tellen van voorkomen - isset = aanwezig en niet null
foreach($gesorteerdeKraktersOmgekeerd as $value)
	{
		if ( isset ( $tellerArray[ $value ] ) )
		{
			++$tellerArray[ $value ];
		}
		else
		{
			$tellerArray[ $value ] = 1;
		}
	}



?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>looping statements foreach deel 1</title>
    </head>
    <body>
    	<h1>looping statements foreach deel 1</h1>

    	<h2>Array van Z naar A</h2>
		<pre><?php var_dump ( $textChars ) ?></pre>

		<h2>Array reversed</h2>
		<pre><?php var_dump ( $gesorteerdeKraktersOmgekeerd ) ?></pre>

		<h2>Array voorkomen van letters</h2>
		<pre><?php var_dump ( $tellerArray ) ?></pre>

        
    </body>
</html>