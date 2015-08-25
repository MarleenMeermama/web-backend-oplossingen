<?php

$message	=	FALSE;
$currentFilename	=	$_SERVER['PHP_SELF'] ;
	
	
if ( isset( $_POST[ 'submit' ] ) ){


	try
	{

		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', ''); // Connectie maken
		
		$queryString = 'INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet)
									VALUES ( :brnaam, :adres, :postcode, :gemeente, :omzet )';

		$statement = $db->prepare($queryString);
		$statement->bindValue(':brnaam', $_POST['brnaam'] );
		$statement->bindValue(':adres', $_POST['adres'] );
		$statement->bindValue(':postcode', $_POST['postcode'] );
		$statement->bindValue(':gemeente', $_POST['gemeente'] );
		$statement->bindValue(':omzet', $_POST['omzet'] );

		$isAdded = $statement->execute();


		if ( $isAdded )
		{
			$insertId			=	$db->lastInsertId();
			$message['type']	=	'success';
			$message['text']	=	'Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is ' . $insertId . '.';
		}
		else
		{
			$message['type']	=	'error';
			$message['text']	=	'Er ging iets mis met het toevoegen, probeer opnieuw';
		}
	}	
	
	
	catch ( PDOException $e )
	{
		$message['type']	=	'error';
		$message['text']	=	'Er ging iets mis: ' . $e->getMessage();
	}

}

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD insert deel 1</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css" >
     </head>
    <body>
       <h1>CRUD insert deel 1</h1>

      
		<?php if ( $message ): ?>
			<div class="modal <?= $message[ "type" ] ?>">
				<?= $message['text'] ?>
			</div>
		<?php endif ?>

       <form action="<?= $currentFilename ?>" method="POST">
       		
			<ul>
			<li>
				<label for="brnaam">Brouwernaam</label>
				<input type="text" name="brnaam" id="brnaam">
			</li>
			<li>
				<label for="adres">Adres</label>
				<input type="text" name="adres" id="adres">
			</li>
			<li>
				<label for="postcode">Postcode</label>
				<input type="text" name="postcode" id="postcode">
			</li>
			<li>
				<label for="gemeente">Gemeente</label>
				<input type="text" name="gemeente" id="gemeente">
			</li>
			<li>
				<label for="omzet">Omzet</label>
				<input type="text" name="omzet" id="omzet">
			</li>
		</ul>
		
		<input type="submit" value="Voeg toe" name="submit">
       		
		</form>
    

    </body>
</html>