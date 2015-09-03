<?php 

session_start();

	function __autoload( $className )
	{
		include_once( 'classes/' . $className . '.php' );
	}

	// Haal de messages op die eventueel geset zijn
	$message = Message::getMessage();

	if(isset($_SESSION['user']['bestand'])){
		$bestandsnaam = 'img/'.$_SESSION['user']['bestand'];
	}else{
		//dummy ophalen
		$bestandsnaam =  "\img\profielfoto_placeholder.jpg";
	}

	$email = $_SESSION['user']['email'];

	?>

 <!doctype html>
 <html>
     <head>
         <meta charset="utf-8">
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Untitled</title>
         <link rel="stylesheet" href="css/global.css">
         <link rel="author" href="humans.txt">
     </head>
     <body>
         
         <body>

		<a href="gegevens-wijzigen-form.php"> Overzicht </a> | 
		<a href="gebruikers-toevoegen-form.php"> Toevoegen </a> |

		<h1>Gegevens wijzigen</h1>


		<?php if ( $message ): ?>
			<div class="modal <?= $message['type'] ?>"><?= $message['text'] ?></div>
		<?php endif ?>
		
		<h2>Profielfoto</h2>
		
		<form action="gegevens-wijzigen-process.php" method="POST"  enctype="multipart/form-data">
		    
		    <ul>
		        <li><img src="<?php echo $bestandsnaam ?>" alt="profielfoto"></li>
		        <li>
		            <label for="email">E-mail: </label>
		            <input type="text" id="email" name="email" value="<?php echo $email ?>">
		        </li>
		        <li>
		        	<label for="file">Bestand: </label>
					<input type="file" name="file" id="file" value="<?php echo $bestandsnaam ?>"> 
		        </li>
		    </ul>
		    <input type="submit" value="Gegevens wijzigen" name="submit">
		</form>

    </body>
     </body>
 </html>