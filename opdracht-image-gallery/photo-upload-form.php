<?php
	session_start();

	function __autoload( $classname )
	{
		require_once( 'classes\\'.$classname . '.php' );
	}

	$message	=	Message::getMessage();

?>

<!DOCTYPE html>
	<html>
	<head>
		 <title>opdracht image manipulation Gallery</title>
		<link rel="stylesheet" type="text/css" href="css/global.css">
	</head>
	<body>
		
		<a href="photo-upload-form.php">Terug naar de galerij</a>

		<h1>Foto uploaden</h1>

		<?php if ( $message ): ?>
			<div class="modal <?php echo $message['type'] ?>">
				<?php echo $message['text'] ?>
			</div>
		<?php endif ?>

		<form action="photo-upload.php" method="POST" enctype="multipart/form-data">
			<ul>
				<li>
					<label for="image">bestand uploaden</label>
					<input type="file" name="image" id="image">
				</li>
				<li>
					<label for="title">Titel</label>
					<input type="text" name="title" id="title">
				</li>
				<li>
					<label for="caption">Beschrijving</label>
					<input type="text" name="caption" id="caption">
				</li>
			</ul>
			
			<input type="submit" name="submit">

		</form>
		
	</body>
</html>