<?php

	$messageContainer	=	'';
	$geselecteerdeBrouwer = False;

	try
	{

		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', ''); // Connectie maken
		//$messageContainer	=	'Connectie dmv PDO geslaagd.';

		$queryString = 'SELECT brouwernr, brnaam FROM brouwers';

		$statement = $db->prepare($queryString);

		$statement->execute();

		$brouwers = array();

		while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$brouwers[]	=	$row;
		}
		//var_dump($brouwers);
		
		if (isset( $_GET[ 'brouwernr' ] )){
			
			$geselecteerdeBrouwer = $_GET['brouwernr'];
			$queryString = 'SELECT bieren.naam FROM bieren WHERE bieren.brouwernr = :geselecteerdeBrouwer';
			$statement = $db->prepare($queryString);
			$statement->bindValue(':geselecteerdeBrouwer', $geselecteerdeBrouwer );
		}else{
			$queryString = 'SELECT bieren.naam FROM bieren';
			$statement = $db->prepare($queryString);
		}	

			$statement->execute();

			$bieren = array();
			while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
			{
			$bieren[]	=	$row;
			}
			//var_dump($bieren);

			
			$bierenHeader		= array();
			$bierenHeader[] 	= 'aantal';
			foreach ($bieren[0] as $key => $value) {
				$bierenHeader[] 	= $key;
			}

			//var_dump($bierenHeader);

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
        <title>CRUD query deel 2</title>
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
       <h1>CRUD query deel 2</h1>
       <p><?php echo $messageContainer ?></p>
       <form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
       		<select name="brouwernr">
       			<?php foreach ($brouwers as $key => $brouwer): ?>
       				<option value = "<?php echo $brouwer['brouwernr'] ?>" <?= ( $geselecteerdeBrouwer === $brouwer['brouwernr'] ) ? 'selected' : '' ?> > <?= $brouwer['brnaam'] ?></option>
       		<?php endforeach ?>
       		</select>
       		<input type="submit" value="Geef mij alle bieren van deze brouwerij">
		</form>
       <div>
       	<table>
       		<thead>
       			
       			<?php foreach ($bierenHeader as $value): ?>
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