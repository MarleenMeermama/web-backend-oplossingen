<?php 

session_start();

function __autoload( $className )
	{
		include_once( 'classes/' . $className . '.php' );
	}


var_dump( $_FILES );


if ( isset( $_POST[ 'submit' ] ) ){

		$picture	=	$_FILES['image'];

		if ( $picture['type'] === 'image/jpeg' || 
				$picture['type'] === 'image/gif' ||
				$picture['type'] === 'image/png' )
		{
			if ( $picture['size'] < 5000000)
			{
				$uniqueFilename = File::returnUniqueFilename( $picture );
				move_uploaded_file( $picture['tmp_name'], $uniqueFilename );
				// var_dump($uniqueFilename);

				// Haal de bestandsnaam en de extensie uit het bestand
				$fileParts	=	pathinfo($uniqueFilename);
				$fileName	=	$fileParts['filename'];
				$ext		=	$fileParts['extension'];
				var_dump($fileParts);

				// Bepaal de dimensies van de verkleining
				$thumbDimensions['w']	=	100;
				$thumbDimensions['h']	=	100;

				// Haal de breedte en de hoogte op uit het originele bestand
				list($width, $height)	=	getimagesize($uniqueFilename);

				//landscape, portrait en vierkant
				if($width > $height){
					$dimensie = 'landscape';
				}else{
					$dimensie = 'portrait';
				}

				//bepalen nulpunt
				if($dimensie === 'landscape'){
					$setoff_x = $width/2 - $height/2; 
					$setoff_y = 0;
					$new_width = $height;
					$new_height = $height;

				}else{
					$setoff_x = 0; 
					$setoff_y = $height/2 - $width/2;
					$new_width = $width;
					$new_height = $width;
				}
				// var_dump($setoff);

				// Controleer om welke extensie het gaat en voer de overeenstemmende methode uit
				switch ($ext)
				{
					case ('jpg'):
					case ('jpeg'):
						$source 	= 	imagecreatefromjpeg($uniqueFilename);
						break;
						
					case ('png'):
						$source 	=	imagecreatefrompng($uniqueFilename);
						break;

					case ('gif'):
						$source 	=	imagecreatefromgif($uniqueFilename);
						break;
				}

				// Creëer een leeg canvas met de dimensies van de nieuwe afbeelding
				$thumb 	=	imagecreatetruecolor($thumbDimensions['w'], $thumbDimensions['h']);

				//crop
					imagecopyresampled($thumb, $source, 0,0, $setoff_x,$setoff_y, $thumbDimensions['w'],$thumbDimensions['h'], $new_width, $new_height);



				// Slaag het nieuwe canvas op als jpg (canvas, (folder).fileName, kwaliteit)
					$resized 	= 	imagejpeg($thumb, ('img/'.'thumb_'.$fileName.'.'. $ext), 100);
				
				
				if ($resized){

					$_SESSION['image']['upload'] = 'img/'.'thumb_'.$fileName.'.'. $ext;
					var_dump($_SESSION['image']['upload']);
					Helper::redirect( 'index.php' );
				}

				



			}
			else
			{
				Message::setMessage( 'Het bestand is te groot (> 5Mb)', 'error' );
				Helper::redirect( 'index.php' );
			}

		}	
		else
		{
			Message::setMessage("Enkel .jpg, .gif of .png zijn toegelaten", 'error');
			Helper::redirect( 'index.php' );
		}
} 

 ?>