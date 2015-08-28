<?php

	var_dump( $_POST );

	session_start();
	function __autoload( $className )
	{
		include_once( 'classes/' . $className . '.php' );
	}

	$currentPage	=	basename( $_SERVER[ 'PHP_SELF' ] );

	$isDeleted	=	FALSE;
	$isEdit		= 	FALSE;
	$messageDeleteConfirm = FALSE;
	$formulierBrouwer	=	FALSE;
	$currentFilename	=	$_SERVER['PHP_SELF'] ;
	$brouwerID = '';
	$emailSysteembeheerder 	= 'systeembeheerder@info.test';
	$tempBrouwer = array();


	try
	{
		

		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', ''); 

		if ( isset($_POST['confirmDelete'])){
			$messageDeleteConfirm = TRUE;
			$brouwerID = $_POST['confirmDelete'];
		}


		if ( isset($_POST['delete'])){
			
			$deleteQuery	=	'DELETE FROM brouwers
								WHERE brouwers.brouwernr = :brouwernr
								LIMIT 1';

			$deleteStatement = $db->prepare( $deleteQuery );

			$deleteStatement->bindValue( ':brouwernr', $_POST['delete'] );

			$isDeleted 	=	$deleteStatement->execute();

			if ( $isDeleted )
			{
				Message::setMessage('Deze record is succesvol verwijderd.','succes');
			
			}else{
				Message::setMessage('De datarij kon niet verwijderd worden. Probeer opnieuw.', 'error');
			}
		}

		if( isset($_POST['confirmEdit']) ){
			
			$specifiekeBrouwerQuery	= 'SELECT * 
										FROM brouwers 
										WHERE brouwers.brouwernr = :brouwernr
										LIMIT 1';

			$selectBrouwerStatement = $db->prepare($specifiekeBrouwerQuery);

			$selectBrouwerStatement->bindParam( ':brouwernr', $_POST['confirmEdit'] );
			$isBrouwerGevonden = $selectBrouwerStatement->execute();
			
			$formulierBrouwer = TRUE;
			
			while ( $row = $selectBrouwerStatement->fetch(PDO::FETCH_ASSOC) )
			{
				$_SESSION[ 'brouwer' ][]	=	$row;

			}
		}		
			
		
		if( isset($_POST['edit'])){

			$formulierBrouwer = FALSE;
			$selectSet =  '';
			// var_dump($_SESSION[ 'brouwer' ][0]);
			
			foreach ($_SESSION[ 'brouwer' ][0] as $kolomnaam => $value) {
				 if ($_POST[$kolomnaam] != $value) {
						$selectSet = $selectSet . $kolomnaam . '=' . $_POST[$kolomnaam] . ' ,';
				}
			}
			$selectSet = substr_replace($selectSet,' ',-2);
			var_dump($selectSet);

			$updateQuery	=	'UPDATE brouwers SET ' . $selectSet . ' WHERE brouwernr	= '. $_POST['brouwernr' ];
			
			var_dump($updateQuery);

			$statement = $db->prepare($updateQuery);

			$updateSuccessful	=	$statement->execute();

			if ( $updateSuccessful )
			{
				Message::setMessage('Update op de brouwer ' . $_POST[ 'brnaam' ] . ' succesvol uitgevoerd.', 'succes');
			}
			else
			{
				Message::setMessage('Aanpassing is niet gelukt. Probeer opnieuw of neem contact op met de systeembeheerder wanneer deze fout blijft aanhouden'.'<a href="mailto:' .$emailSysteembeheerder . '">' , 'error');
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
		$brouwerHeader[] = " ";

		//var_dump($brouwerHeader);

	}
		 
	catch ( PDOException $e )
	{
		Message::setMessage( 'Er ging iets mis: ' . $e->getMessage(), 'error' );
	}

	$message	=	Message::getMessage();
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD update deel 2</title>
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
       
		<?php if ($formulierBrouwer): ?>
			<h1>Brouwerij <?php echo $_SESSION['brouwer'][0]['brnaam'] ?> (#<?php echo $_SESSION['brouwer'][0]['brouwernr'] ?>) wijzigen</h1>
			
			<form action="<?= $currentFilename ?>" method="POST">
	       		
				<ul>
				<li>
					<label for="brnaam">Brouwernaam</label>
					<input type="text" name="brnaam" id="brnaam"  value = "<?php echo $_SESSION['brouwer'][0]['brnaam'] ?>">
				</li>
				<li>
					<label for="adres">Adres</label>
					<input type="text" name="adres" id="adres" value = "<?php echo $_SESSION['brouwer'][0]['adres'] ?>">
				</li>
				<li>
					<label for="postcode">Postcode</label>
					<input type="text" name="postcode" id="postcode" value = "<?php echo $_SESSION['brouwer'][0]['postcode'] ?>">
				</li>
				<li>
					<label for="gemeente">Gemeente</label>
					<input type="text" name="gemeente" id="gemeente" value = "<?php echo $_SESSION['brouwer'][0]['gemeente'] ?>">
				</li>
				<li>
					<label for="omzet">Omzet</label>
					<input type="text" name="omzet" id="omzet" value = "<?php echo $_SESSION['brouwer'][0]['omzet']?>">
				</li>
			</ul>
			<input type="hidden" name="brouwernr" value = "<?= $_SESSION['brouwer'][0]['brouwernr']?>" >
			<input type="submit" value="Wijzigen" name="edit">
	       		
			</form>
				
		<?php endif ?>

       <h2>Overzicht van de bieren</h2>
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
							<td><button type="submit" name = "confirmDelete" value = "<?php echo $brouwer['brouwernr']?>"><img src="icon-delete.png" alt="icoon voor delete"></button></td>
							<td><button type="submit" name = "confirmEdit" value = "<?php echo $brouwer['brouwernr']?>"><img src="edit.gif" alt="icoon voor edit"></button></td>
		       			</tr>
	       			<?php endforeach ?>
	       		</tbody>
	       	</table> 
		</form>
       </div> 

    </body>
</html>