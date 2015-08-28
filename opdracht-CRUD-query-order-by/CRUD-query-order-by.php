<?php
	
	try 
	{

		function __autoload( $className )
		{
			include_once( 'classes/' . $className . '.php' );
		}

		$currentPage	=	basename( $_SERVER[ 'PHP_SELF' ] );
		$order 			= 'ASC';
		$orderColumn	= 'bieren.biernr';

		if(isset($_GET['orderBy'])){
			$orderArray 	= explode('-', $_GET[ 'orderBy' ]);
			$orderColumn 	=	$orderArray[ 0 ];
			$order			=	$orderArray[ 1 ];
		}

		$orderQuery	=	' ORDER BY '. $orderColumn . " ". $order;

		if ( isset( $_GET[ 'orderBy' ] ) ){
			$order = ( $orderArray[ 1 ] != 'DESC') ? 'DESC' : 'ASC';
		}

		$dbi	=	new Database( 'mysql', 'localhost', 'bieren', 'root', '' );

		$bierenQuery	=	"SELECT bieren.biernr,
									bieren.naam,
									brouwers.brnaam,
									soorten.soort,
									bieren.alcohol 
							 FROM bieren 
									INNER JOIN brouwers
									ON bieren.brouwernr	= brouwers.brouwernr
									INNER JOIN soorten
						            ON bieren.soortnr = soorten.soortnr"
				            . $orderQuery;

		$bieren = $dbi->query( $bierenQuery );

		
		function tabelnamen($origineleTabelnamen){

			$nieuweTabelnamen = array();

			foreach ($origineleTabelnamen as $key => $value) {
				switch ($key) {
					case 'biernr':
						$waarde = 'Biernummer (PK)';
						break;
					
					case 'naam':
						$waarde = 'Bier';
						break;

					case 'brnaam':
						$waarde = 'Brouwer';
						break;

					case 'soort':
						$waarde = 'Soort';
						break;

					case 'alcohol':
						$waarde = 'Alcoholpercentage';
						break;
				}
				$nieuweTabelnamen[$key] = $waarde;
			}
			return $nieuweTabelnamen;
		}

		
		$kolomnamen = tabelnamen($bieren[0]);

	} 

	catch (Exception $e) 
	{

		Message::setMessage( $e->getMessage(), 'error' );
	}

	$message	=	Message::getMessage();


?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht CRUD query - order by: deel 1</title>
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/global.css" >
		<style>
			.even
			{
				background-color: lightgrey;
			}
			.order a
			{
				padding-right:20px;
    			background-repeat:no-repeat;
    			background-position:right;
			}

        	.ascending a
			{
				background:	no-repeat url('icon-asc.png') right ;
			}

			.descending a
			{
				background:	no-repeat url('icon-desc.png') right;
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
	

	<table>
		
		<thead>
			<tr>

				<?php foreach ($kolomnamen as $key => $value): ?>
					<th class = " order <?= ( $order == 'ASC') ? 'descending' : 'ascending' ?>"><a href="<?php echo $currentPage ?>?orderBy=<?php echo $key ?>-<?= $order ?>"><?php echo $value ?> </a></th>
				<?php endforeach ?>
				
			</tr>
		</thead>

		<tbody>
			<?php foreach ($bieren as $key => $bierinfo): ?>
				<tr class="<?= ( ($key + 1) % 2 == 0 ) ? 'even' : '' ?>">
					<?php foreach ($bierinfo as $value): ?>
						<td><?= $value ?></td>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?> 
			
		</tbody>

	</table>



    </body>
</html>