<?php  
$rijen = 10;
$kolommen = 10;
$product =array();
$tafel = array();

for($rijteller = 0; $rijteller < $rijen; ++$rijteller){
	for($kolomteller = 1; $kolomteller < $kolommen; ++$kolomteller){
		$product[$kolomteller] = $rijteller*$kolomteller;
	}
	$tafel[$rijteller]	= $product;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>looping statements for deel 3</title>
    </head>
    <body>
    	<h1>looping statements for deel 3</h1>
	
		<?php foreach ($tafel as $tafelVan => $tafelResultaat): ?>
			<ul>De tafel van <?php echo $tafelVan ?>
				<?php foreach ($tafelResultaat as $Vermeningvuldiging): ?>
					<li><?php echo $Vermeningvuldiging ?></li>
				<?php endforeach ?>
			</ul>
		<?php endforeach ?>
		
    </body>
</html>