<?php  

function berekenRente($bedrag,$rente,$duurtijd, $container = array() )
{
	static $jaartal = 1;
	$infoRente = array();


	if ($jaartal <= $duurtijd){
		$renteBedrag = floor($bedrag*$rente/100);
		$bedrag = $bedrag + $renteBedrag;
		$infoRente[$bedrag]=$renteBedrag;
		$container[$jaartal] = $infoRente;
		++$jaartal;
		return berekenRente($bedrag,$rente,$duurtijd, $container);
		
	}
	else
	{
	return $container;	
	}	
}

$resultaat = berekenRente(100000,8,10);

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>functions recursive deel 1</title>
        
    </head>
    <body>
        <h1>functions recursive deel 1</h1>
        <?php foreach ($resultaat as $jaar => $info): ?>
        	<?php foreach ($info as $bedrag1 => $rente1): ?>
        		<p>Na <?php echo $jaar ?> jaar bedraagt het nieuwe bedrag <?php echo $bedrag1 ?> met <?php echo $rente1 ?> rente.</p>
        	<?php endforeach ?>
        <?php endforeach ?>
    </body>
</html>