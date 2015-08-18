<?php 

$email 		= "";
$nickname 	= "";

session_start();
//var_dump( $_SESSION );

// Sessie verwijderen
	if (isset($_POST['submit']))
	{
		if($_POST['submit'] === 'vernietig sessie')
		{
			session_destroy();
			header('Location: opdracht-sessions-deel1.php'); // staat in voor refresh
		}
	}

 	$email      =   ( isset( $_SESSION[ 'registratie' ][ 'deel1' ][ 'email'] ) ) ? $_SESSION[ 'registratie' ][ 'deel1' ][ 'email'] : '';

    $nickname   =   ( isset( $_SESSION[ 'registratie' ][ 'deel1' ][ 'nickname'] ) ) ? $_SESSION[ 'registratie' ][ 'deel1' ][ 'nickname'] : '';


 ?>

 <!doctype html>
 <html>
     <head>
         <meta charset="utf-8">
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>opdracht session deel 1</title>
        </head>
     <body>
     	<h1>opdracht session deel 1</h1>
     	<h2>Deel 1: registratiegegevens</h2>
         <form action="opdracht-sessions-deel2.php" method="POST">
			
			<ul>
				<li>
					<label for="email">email</label>
					<input type="text" id="email" name="email" value="<?= $email ?>" placeholder="vul email in" <?= (isset($_GET['focus']) && $_GET['focus'] == 'email')?'autofocus':''?> >
				</li>
				<li>
					<label for="nickname">nickname</label>
					<input type="text" id="nickname" name="nickname" value="<?= $nickname ?>" placeholder="vul nickname in" <?= (isset($_GET['focus']) && $_GET['focus'] == 'nickname')?'autofocus':''?> >
				</li>
			</ul>

			<input type="submit" name="submit" value="volgende">

		</form>
     </body>
 </html>