<?php

	$messageContainer	=	'';

	try
	{

		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', ''); // Connectie maken
		//$messageContainer	=	'Connectie dmv PDO geslaagd.';

		$queryString = 'SELECT *
						FROM bieren INNER JOIN brouwers
						ON bieren.brouwernr = brouwers.brouwernr
						WHERE bieren.naam LIKE "Du%" AND brouwers.brnaam LIKE "%a%"';

		$statement = $db->prepare($queryString);

		$statement->execute();

		$bieren = array();

		while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$bieren[]	=	$row;
		}
		//var_dump($bieren);
		foreach ($bieren[0] as $key => $value) {
			$kolomNaam[]	= $key;
		}
		//var_dump($kolomNaam);
	
	}
	catch ( PDOException $e )
	{
		$messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
	}


?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD query deel1</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css" >
        <style>
			thead 
			{
				background-color: grey; 
			}
			.even
			{
				background-color:lightgrey;
			}
        </style>
     </head>
    <body>
       <h1>CRUD query deel1</h1>
       <p><?php echo $messageContainer ?></p>
       <div>
       	<table>
       		<thead>
       			<td>#</td>
       			<?php foreach ($kolomNaam as $value): ?>
       				<td> <?php echo $value ?> </td>
       			<?php endforeach ?>
       			
       		</thead>
       		<tbody>
       			<?php foreach ($bieren as $key => $value): ?>
	       			<tr class="<?= ( $key %2 == 0 ) ? 'even' : '' ?>">
	       				<td ><?php echo ($key + 1) ?></td>
	       				
						<?php foreach ($bieren[$key] as $key => $value): ?>
							<td ><?php echo $value ?></td>
						<?php endforeach ?>
	       				
	       			</tr>
       			<?php endforeach ?>
       		</tbody>
       	</table>

       </div>

    </body>
</html>