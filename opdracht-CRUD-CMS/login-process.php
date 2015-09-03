<?php 

// alle logica achter het inloggen van een gebruiker.

session_start();

	function __autoload( $className )
    {
        include_once( 'classes/' . $className . '.php' );
    } 

    // bij rechtstreeks surfen naar deze pagina, ga naar login-form
 	header('location: login-form.php');

// Maak een connectie met de database en selecteer alle gegevens op basis van het ingevulde e-mailadres.
    
$loginForm = "login-form.php";

if(isset($_POST['submit'])){

	$email = $_POST[ 'email' ]	;
	$password = $_POST[ 'password' ];

	$_SESSION[ 'registration' ][ 'email' ]		=	$email;
	$_SESSION[ 'registration' ][ 'password' ]	=	$password;


	//geldig email ?
	$isEmail	=	filter_var( $email, FILTER_VALIDATE_EMAIL );
	if ( !$isEmail )
	{
		$_SESSION['notification']['message'] = "Dit is geen geldig e-mailadres. Vul een geldig e-mailadres in." ;
		$_SESSION['notification']['type'] = "error";

		header('location: ' . $loginForm );
	}

	// password niet leeg
	elseif ( $password == '' )
	{
		$_SESSION['notification']['message'] = "Dit is geen geldig paswoord. Vul een geldig paswoord in." ;
		$_SESSION['notification']['type'] = "error";
		
		header('location: ' . $loginForm );
	}	
	
	// user selecteren

	else
	{	
		$db	=	new  Database( 'mysql', 'localhost', 'cms', 'root', '' );

		$gebruikerToevoegenQuery = "SELECT * 
										FROM user 
										WHERE email = :email";
		$placeholders = array(':email' => $email );
		$userData	=	$db->query( $gebruikerToevoegenQuery, $placeholders);

		
		if( ! isset( $userData[0] ) ) // user werd niet teruggevonden in db
		{
			$_SESSION['notification']['message'] = "De user werd niet gevonden tijdens het inloggen." ;
			$_SESSION['notification']['type'] = "error";
			header( 'location: '.$loginForm );

		} else {  //user werd in db gevonden - controle paswoord
			$salt 		= 	$userData[0]['salt'];
			$passwordDb = 	$userData[0]['hashed_password'];

			$newlyHashedPassword = hash( 'sha512', $password.$salt);
			
			if ($newlyHashedPassword == $passwordDb)
				// Als paswoord OK dan moet de cookie geset worden.
			{
				$hashedEmail	=	hash( 'sha512', $email.$salt );
				$cookieValue	=	$email . '##' . $hashedEmail;

				$cookie	=	setcookie( 'login', $cookieValue, time() + 3600 );

				$_SESSION['notification']['message'] = "Welkom in onze app." ;
				$_SESSION['notification']['type'] = "success";
				header('location: dashboard.php');

			}else{ //foutief paswoord
				$_SESSION['notification']['message'] = "Het paswoord werd niet gevonden." ;
				$_SESSION['notification']['type'] = "error";
				header( 'location: '.$loginForm );
			}
			
		}

	}		
}

?>