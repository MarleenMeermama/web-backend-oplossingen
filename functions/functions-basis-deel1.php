<?php  
	$getal1	=	rand();
	$getal2	=	rand();
	$woord	=	"bedoeling";


	function berekensom($getal1,$getal2){
		return $getal1 + $getal2;
	}

	function vermenigvuldig($getal1,$getal2){
		return $getal1 * $getal2;
	}

	function isEven($getal){
		if ( $getal%2 != 0 )
		{
			return false;
		}
		return true;
	}

	function stringToUpperAndLength($woord){
		$stringinfo['upper'] = strtoupper($woord);
		$stringinfo['lengte'] = strlen($woord);
		return $stringinfo;

	}

	$resultaat = stringToUpperAndLength( $woord );

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>functions basis deel 1</title>
        
    </head>
    <body>
		<h1>functions basis deel 1</h1>
		<p>De som van <?php echo $getal1 ?> en <?php echo $getal2 ?> is <?php echo berekensom($getal1,$getal2)?></p>
		<p>Het product van <?php echo $getal1 ?> en <?php echo $getal2 ?> is <?php echo vermenigvuldig($getal1,$getal2) ?></p>
		<p><?php echo $getal1 ?> is <?php echo (isEven($getal1)?'even':'oneven') ?></p>
		<p>De lengte van '<?php echo $woord ?>' is <?php  echo $resultaat['lengte'] ?></p>
		<p>'<?php echo $woord ?>' in hoofdletters is <?php  echo $resultaat['upper'] ?></p>

    </body>
</html>