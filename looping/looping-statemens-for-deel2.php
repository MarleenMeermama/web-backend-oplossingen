<?php  
$rijen = 10;
$kolommen = 10;
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
			td
			{
				padding: 10px;
				border: 2px solid black;
			}
			.oneven
			{
					background: green;
					color: white;
			}
    	</style>
        <title>looping statements for deel 2</title>
    </head>
    <body>
    	<h1>looping statements for deel 2</h1>
    	<table>
			<?php for($rijteller = 0; $rijteller <= $rijen; ++$rijteller): ?>
					<tr>
					<?php for($kolomteller = 0; $kolomteller <= $kolommen; ++$kolomteller): ?>
						<td class = "<?php echo (($rijteller*$kolomteller)%2 == 1)?'oneven':'' ?>" >
							<?php echo $rijteller*$kolomteller;?>
						</td>
					<?php endfor ?>
					</tr>
			<?php endfor ?>		
    	</table>

    </body>
</html>