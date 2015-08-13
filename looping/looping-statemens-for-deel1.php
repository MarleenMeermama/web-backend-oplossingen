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
    	</style>
        <title>looping statements for deel 1</title>
    </head>
    <body>
    	<h1>looping statements for deel 1</h1>
    	<table>
			<?php for($rijteller = 1; $rijteller <= $rijen; ++$rijteller): ?>
					<tr>
					<?php for($kolomteller = 1; $kolomteller <= $kolommen; ++$kolomteller): ?>
						<td>kolom</td>
					<?php endfor ?>
					</tr>
			<?php endfor ?>		
    	</table>
    </body>
</html>