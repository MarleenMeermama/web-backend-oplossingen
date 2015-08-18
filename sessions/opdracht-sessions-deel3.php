<?php 
session_start();

if ( isset( $_POST[ 'submit' ] ) ){
		$_SESSION['registratie']['deel2']['straat'] = $_POST['straat'];
		$_SESSION['registratie']['deel2']['nummer'] = $_POST['nummer'];
		$_SESSION['registratie']['deel2']['gemeente'] = $_POST['gemeente'];
		$_SESSION['registratie']['deel2']['postcode'] = $_POST['postcode'];
	}

 	$registrationData    =   $_SESSION['registratie'];

  	//var_dump( $_POST );
	//var_dump( $_SESSION );
 ?>

 <!doctype html>
 <html>
    <head>
         <meta charset="utf-8">
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>opdracht session deel 3</title>
    </head>
    <body>
        <h1>opdracht session deel 3</h1>
        <h2>Overzicht</h2>
        <ul>

	        <?php foreach( $registrationData as $deelKey => $deelArray ):  ?>

	            <?php foreach( $deelArray as $dataKey => $value ):  ?>
	                <li>
	                    <p><?= $dataKey ?>: <?= $value ?>
	                    <a href="opdracht-sessions-<?= $deelKey ?>.php?focus=<?= $dataKey ?>">wijzig</a></p>
	                </li>
	            <?php endforeach ?>

	        <?php endforeach ?>
        
        </ul>
     	<form action="opdracht-sessions-deel1.php" method="POST">
        
        	<input type="submit" name="submit" value="vernietig sessie">

    	</form>
     </body>
 </html>