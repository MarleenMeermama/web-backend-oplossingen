<?php session_start();

    function __autoload( $className )
    {
        include_once( 'classes/' . $className . '.php' );
    } 


if ( isset( $_COOKIE['login'] ) )
	{
		
		$userData		=	explode( '##', $_COOKIE['login'] );
		$email			= 	$userData[0];
		$saltedEmail	= 	$userData[1];
		$_SESSION['registration']['email'] = $email


		$db	=	new  Database( 'mysql', 'localhost', 'cms', 'root', '' );

		$userQuery = "SELECT * 
										FROM user 
										WHERE email = :email";
		$placeholders = array(':email' => $email );
		$userData	=	$db->query( $userQuery, $placeholders);

		$inlogSucces = FALSE;
		

		if( isset( $userData[0] ) )
		{
			$salt = $userData[0]['salt'];
			$newlySaltedEmail 	= hash( 'sha512' , $email.$salt );

			if ( $newlySaltedEmail == $saltedEmail ){
			
				$inlogSucces = TRUE;
			}
		}

		if (! $inlogSucces)
			{
				$_SESSION['notification']['message'] = "Er ging iets mis tijdens het inloggen, probeer opnieuw." ;
				$_SESSION['notification']['type'] = "error";
				setcookie( 'login', '', 0 );
				header( 'location: login-form.php' );
			}

	}else{
		$_SESSION['notification']['message'] = "Log even terug aan." ;
		$_SESSION['notification']['type'] = "error";
		header( 'location: login-form.php' );
	}		

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
        <p><a href="dashboard.php">Terug naar dashboard</a> <?php echo $email ?> <a href="logout.php">uitloggen</a></p>
        <h1>Dashboard</h1>

         <?php if ( isset($_SESSION['notification'] )): ?>
            <div class="modal <?php echo $_SESSION['notification']['type'] ?>">
                <?php echo $_SESSION['notification']['message'] ?>
            </div>
             <?php unset($_SESSION['notification']) ?>
        <?php endif ?>
			
		<ul>
			<li><a href="artikel-overzicht.php">Artikels</a></li>
		</ul>

    </body>
</html>

