<?php 
	session_start();

	if ( isset( $_POST[ 'submit' ] ) ){
		$_SESSION['registratie']['deel1']['email'] = $_POST['email'];
		$_SESSION['registratie']['deel1']['nickname'] = $_POST['nickname'];
	}


  	//var_dump( $_POST );
	//var_dump( $_SESSION );

 /* Voorgaande registratie-data van deel1 */
    $registrationData[ 'deel1' ]     =   $_SESSION[ 'registratie' ][ 'deel1' ];

 /* Voorgaande registratiedata van deel2 */
    $straat      =   ( isset( $_SESSION[ 'registratie' ][ 'deel2' ][ 'straat'] ) ) ? $_SESSION[ 'registratie' ][ 'deel2' ][ 'straat'] : '';

    $nummer      =   ( isset( $_SESSION[ 'registratie' ][ 'deel2' ][ 'nummer'] ) ) ? $_SESSION[ 'registratie' ][ 'deel2' ][ 'nummer'] : '';

    $gemeente      =   ( isset( $_SESSION[ 'registratie' ][ 'deel2' ][ 'gemeente'] ) ) ? $_SESSION[ 'registratie' ][ 'deel2' ][ 'gemeente'] : '';

    $postcode      =   ( isset( $_SESSION[ 'registratie' ][ 'deel2' ][ 'postcode'] ) ) ? $_SESSION[ 'registratie' ][ 'deel2' ][ 'postcode'] : '';


 ?>

 <!doctype html>
 <html>
     <head>
         <meta charset="utf-8">
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>opdracht session deel 2</title>
        </head>
     <body>
         <h1>opdracht session deel 2</h1>
         <h2>Registratiegegevens</h2>
         	<ul>
         		<?php foreach( $registrationData[ 'deel1' ] as $data => $value ):  ?>
            		<li><?= $data ?>: <?= $value ?></li>
        		<?php endforeach ?>
         	</ul>
         <h2>Deel 2: Adres</h2>
         	<form action="opdracht-sessions-deel3.php" method="POST">
            
            <ul>
                <li>
                    <label for="straat">straat</label>
                    <input type="text" id="straat" name="straat" value="<?= $straat ?>" placeholder="vul straat in"  <?= (isset($_GET['focus']) && $_GET['focus'] == 'straat')?'autofocus':''?> >
                </li>
                <li>
                    <label for="nummer">nummer</label>
                    <input type="text" id="nummer" name="nummer" value="<?= $nummer ?>" placeholder="vul nummer in"  <?= (isset($_GET['focus']) && $_GET['focus'] == 'nummer')?'autofocus':''?> >
                </li>
                <li>
                    <label for="gemeente">gemeente</label>
                    <input type="text" id="gemeente" name="gemeente" value="<?= $gemeente ?>" placeholder="vul gemeente in" <?= (isset($_GET['focus']) && $_GET['focus'] == 'gemeente')?'autofocus':''?> >
                </li>
                <li>
                    <label for="postcode">postcode</label>
                    <input type="text" id="postcode" name="postcode" value="<?= $postcode ?>" placeholder="vul postcode in" <?= (isset($_GET['focus']) && $_GET['focus'] == 'postcode')?'autofocus':''?> >
                </li>
            </ul>

            <input type="submit" name="submit" value="volgende">

        </form>
     </body>
 </html>