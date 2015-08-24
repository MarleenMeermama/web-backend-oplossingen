<?php 

$cursus 		=	false;
$voorbeelden 	=	false;
$opdrachten 	=	false;
$submit			=	false;
$rootWebLocal 	= 	'http://web-backend.local/cursus';
$rootLocal 	=	'G:\web-backend\cursus';
$submap 	= '/public/cursus';

if ( isset ( $_GET['link'] ) ) 
	{

		switch ( $_GET['link'] )
		{
			case 'cursus':
				$cursus 	= 	true;
				$bestandsNaam = $rootWebLocal . $submap. '/web-backend-intro.pdf';
				//var_dump($bestandsNaam);
				break;

			case 'voorbeelden':

				$voorbeelden 	= 	true;
				$map			=	'voorbeelden';
				$root 			=	$rootLocal.$submap;
				$bestandenArray 	= 	getBestanden( $map , $root );
				//var_dump($bestandenArray);

				break;

			case 'opdrachten':
			
				$opdrachten 	=	true;
				$map			=	'opdrachten';
				$root 			=	$rootLocal.$submap;
				$bestandenArray 	= 	getBestanden( $map , $root );

				break;
		}
}else if(isset ($_GET['submit'])){
	
		$submit 	=	true;
		$zoekstring = $_POST['zoeken'];
		var_dump($zoekstring);
		$root = $rootLocal.$submap;

		$voorbeeldenBestanden = getBestanden('voorbeelden', $root);
		$opdrachtenBestanden  = getBestanden('opdrachten', $root);
		$alleBestanden = array_merge( $voorbeeldenBestanden, $opdrachtenBestanden );
		
		$resultaten	=	array();


	foreach ($alleBestanden as $bestand)
	{
			$zoekStringGevonden = strpos( $bestand, $zoekString );

		if ( $zoekStringGevonden !== false )
		{
			$resultaten[]	=	$bestand;
		}
		}

		var_dump( $resultaten );

		$bestandenArray = $resultaten;



}

function getBestanden($map,$root){

$path = $root.'\\'.$map. '\\';
//var_dump($path);
$bestandenArray = glob($path.'*\\*.php');
var_dump($bestandenArray);
return $bestandenArray;


}

function convertBeginString($string, $originalStart, $newStart){
$lengthOriginalStart = strlen($originalStart);
$stringWithoutOriginalStart = substr_replace($string, '', 0, $lengthOriginalStart);
return $newStart.$stringWithoutOriginalStart;
}

 ?>


 <!doctype html>
 <html>
     <head>
         <meta charset="utf-8">
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>herhalingsopdracht 1 - deel 1</title>
         <link rel="stylesheet" href="http://web-backend.local/css/global.css">
         <style>
         	iframe
			{
				width:1000px;
				height:750px;
			}
		</style>
     </head>
     <body>
         <h1>Oplossing herhalingsopdracht: deel1</h1>
         <ul>
         	<li><a href="herhalingsopdracht-01-deel1.php?link=cursus">Cursus</a></li>
         	<li> <a href="herhalingsopdracht-01-deel1.php?link=voorbeelden">Voorbeelden</a></li>
         	<li><a href="herhalingsopdracht-01-deel1.php?link=opdrachten">Opdrachten</a></li>
         </ul>

         <form action="herhalingsopdracht-01-deel1" method="POST">
         	<label for="zoeken">Zoeken naar:</label>
         	<input type="text" name="zoeken" id="zoeken">
         	<input type="submit" name="submit" value="verzenden">
         </form>

         <h2>Inhoud</h2>
         
	        <?php if ( $cursus ): ?>
	         	<iframe src="<?php echo $bestandsNaam ?>"></iframe>
	         	$cursus = false;
			<?php endif ?>

			<?php if ( $voorbeelden ): ?>
			<ul>
				<?php foreach ( $bestandenArray as $bestand ): ?>
					<li><a href="<?php echo convertBeginString($bestand,$rootLocal,$rootWebLocal) ?>"><?php echo basename($bestand) ?></a></li>
				<?php endforeach ?>
				$voorbeelden = false;
			</ul>
			<?php endif ?>

			<?php if ( $opdrachten ): ?>
			<ul>
				<?php foreach ( $bestandenArray as $bestand ): ?>
					<li><a href="<?php echo convertBeginString($bestand,$rootLocal,$rootWebLocal) ?>"><?php echo basename($bestand) ?></a></li>
				<?php endforeach ?>
				$opdrachten = false;
			</ul>
			<?php endif ?>

			<?php if ( $submit ): ?>
			<ul>
				<?php foreach ( $bestandenArray as $bestand ): ?>
					<li><?php echo basename($bestand) ?></a></li>
				<?php endforeach ?>
				$submit = false;
			</ul>
			<?php endif ?>



     </body>
 </html>