<?php

	$message	=	FALSE;
	$isDeleted	=	FALSE;
	$messageDeleteConfirm = FALSE;
	$currentFilename	=	$_SERVER['PHP_SELF'] ;
	$brouwerID = '';
	

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', ''); 

		if ( isset($_POST['confirm'])){
			$messageDeleteConfirm = TRUE;
			$brouwerID = $_POST['confirm'];
		}


		if ( isset($_POST['delete'])){
			
			$deleteQuery	=	'DELETE FROM brouwers
								WHERE brouwers.brouwernr = :brouwernr';

			$deleteStatement = $db->prepare( $deleteQuery );

			$deleteStatement->bindParam( ':brouwernr', $_POST['delete'] );

			$isDeleted 	=	$deleteStatement->execute();

			if ( $isDeleted )
			{
				$message['type']	=	'success';
				$message['text']	=	'Deze record is succesvol verwijderd.';
			}else{
				$message['type']	=	'error';
				$message['text']	=	'De datarij kon niet verwijderd worden. Probeer opnieuw.';// Reden: ' . $deleteStatement->errorInfo()[2];
			}
		}

		$queryString = 'SELECT * FROM brouwers';
		$statement = $db->prepare($queryString);
		$statement->execute();
		$brouwers = array();
		while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$brouwers[]	=	$row;
		}
		//var_dump($brouwers);
		
		$brouwerHeader = array();
		$brouwerHeader[] = "#";
		foreach ($brouwers[0] as $key => $value) 
		{
			$brouwerHeader[] = $key;
		}
		$brouwerHeader[] = " ";
		//var_dump($brouwerHeader);

	}
		 
	catch ( PDOException $e )
	{
		$message['type']	=	'error';
		$message['text']	=	'Er ging iets mis: ' . $e->getMessage();
	}


?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD delete deel 2</title>
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
       <h1>Overzicht van de bieren</h1>
       <?php if ( $message ): ?>
			<div class="modal <?= $message[ "type" ] ?>">
				<?= $message['text'] ?>
			</div>
		<?php endif ?>
		<?php if ( $messageDeleteConfirm): ?>
			<form action= "<?= $currentFilename ?>" method = "POST">
				<div class = 'error'>
					<p>Bent u zeker dat u deze datarij wil verwijderen?</p>
					<button type = "submit" name = "delete" value = "<?php echo $brouwerID ?>">Ja!</button>
					<button type = "submit">Nééééé!</button>
				</div>
			</form>
		<?php endif ?>

      <div>
       	<form action="<?php echo $currentFilename ?>" method = "POST">
	       	<table>
	       		<thead>
	       			
	       			<?php foreach ($brouwerHeader as $value): ?>
	       				<td> <?php echo $value ?> </td>
	       			<?php endforeach ?>
	       			
	       		</thead>
	       		<tbody>
	       			
	       			<?php foreach ($brouwers as $key => $brouwer): ?>
		       			<tr class="<?= ( $key %2 == 0 ) ? 'even' : '' ?>">
		       				<td ><?php echo ($key + 1) ?></td>
							<?php foreach ($brouwer as $value): ?>
								<td class = "<?= ($brouwer['brouwernr'] == $brouwerID )? 'error' : '' ?>"><?php echo $value ?></td>
							<?php endforeach ?>
							<td><button type="submit" name = "confirm" value = "<?php echo $brouwer['brouwernr']?>"><img src="icon-delete.png" alt="icoon voor delete"></button></td>
		       			</tr>
	       			<?php endforeach ?>
	       		</tbody>
	       	</table> 
		</form>
       </div> 

    </body>
</html>