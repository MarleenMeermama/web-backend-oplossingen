<?php 

session_start();

function __autoload( $className )
{
	include_once( 'classes/' . $className . '.php' );
}

// bij rechtstreeks surfen naar deze pagina, ga naar registratie-form
header('location: registratie-form.php');
    

$registrationForm = 'registratie-form.php';


if(isset($_POST['genereerPaswoord'])){
	$_SESSION[ 'registration' ][ 'email' ]		=	$_POST[ 'email' ];
	$_SESSION[ 'registration' ][ 'password' ] 	=  randomPassword();
	
	header( 'location: ' . $registrationForm  );


}elseif(isset($_POST['submit'])){

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

			header('location: ' . $registrationForm );
		}

	// password niet leeg
	elseif ( $password == '' )
		{
			$_SESSION['notification']['message'] = "Dit is geen geldig paswoord. Vul een geldig paswoord in." ;
			$_SESSION['notification']['type'] = "error";
			
			header('location: ' . $registrationForm );
		}	
	
	// gebruiker toevoegen aan de database als de gebruiker nog niet bestaat
	else{	
		$db	=	new  Database( 'mysql', 'localhost', 'security', 'root', '' );

		$gebruikerToevoegenQuery = "SELECT * 
										FROM user 
										WHERE email = :email";
		$placeholders = array(':email' => $email );
		$userData	=	$db->query( $gebruikerToevoegenQuery, $placeholders);

		if ( isset( $userData[ 0 ] ) )
			{
				
				$_SESSION['notification']['message'] = "De gebruiker met het e-mailadres " . $email . " komt reeds voor in onze database." ;
				$_SESSION['notification']['type'] = "error";
				header('location: ' . $registrationForm );
			}
		else
			{
				$salt = uniqid(mt_rand(), true);
				$hashedPassword = hash('sha512', $password.$salt);
				$query 	=	'INSERT INTO user 
											(email,
											salt,
											hashed_password,
											last_login_time)
									VALUES (:email,
											:salt,
											:password,
											NOW())';

				
				$tokens	=	array( ':email' => $email,
									':salt' => $salt,
									':password' => $hashedPassword);

				$userData	=	$db->query( $query , $tokens );

			// cookie aanmaken met de juiste value
				$hashedEmail	=	hash( 'sha512', $email.$salt );
				$cookieValue	=	$email . '##' . $hashedEmail;

				$cookie	=	setcookie( 'login', $cookieValue, time() + 3600 );

				$_SESSION['notification']['message'] = "Welkom, u bent vanaf nu geregistreerd in onze app." ;
				$_SESSION['notification']['type'] = "success";
				header('location: dashboard.php');
			}

		}

	// 
}



function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string 8 karakters
}



 ?>