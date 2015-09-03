<?php 
session_start();

	function __autoload( $className )
	{
		include_once( 'classes/' . $className . '.php' );
	}

	$currentPage	=	basename( $_SERVER[ 'PHP_SELF' ] );

	// Haal de messages op die eventueel geset zijn
	$message = Message::getMessage();

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

		<h1>Gebruiker toevoegen</h1>


		<?php if ( $message ): ?>
			<div class="modal <?= $message['type'] ?>"><?= $message['text'] ?></div>
		<?php endif ?>
		
		<form action="gebruikers-toevoegen-process.php" method="POST"  enctype="multipart/form-data">
		    <ul>
		        <li>
		            <label for="email">E-mail: </label>
		            <input type="text" id="email" name="email">
		        </li>
		        <li>
		        	<label for="file">Bestand: </label>
					<input type="file" name="file" id="file"> 
		        </li>
		    </ul>
		    <input type="submit" value="Toevoegen" name="submit">
		</form>

    </body>
     </body>
 </html>