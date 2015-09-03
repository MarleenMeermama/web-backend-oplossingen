<?php 

	session_start();
	function __autoload( $className )
		{
			include_once( 'classes/' . $className . '.php' );
		}

	$message = Message::getMessage();

 ?>

 <!doctype html>
 <html>
     <head>
         <meta charset="utf-8">
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>opdracht image manipulation</title>
         <link rel="stylesheet" href="css/global.css">
         <link rel="author" href="humans.txt">
     </head>

     <body>
         
      <form action="thumnail-genreren-construct.php" method="post" enctype="multipart/form-data">
		
		<?php if ( $message ): ?>
			<div class="modal <?= $message['type'] ?>"><?= $message['text'] ?></div>
		<?php endif ?>

		<h1>Thumbnail genereren</h1>
		<label for="image">foto kiezen</label>
		<input type="file" name="image" id="image">

		<input type="submit" name="submit">

		<img src="<?= $_SESSION['image']['upload'] ?>" alt="Verkleinde afbeelding">

      </form>


     </body>
 </html>