<?php  

$inhoudBestand	=	file_get_contents('cookiesinlogdeel1.txt');

$dataArray		=	explode(',', $inhoudBestand);

$message		=	"";
$hoofding		=	"Inloggen";
$isAuthenticated	=	false;

$geldigeGebruikersnaam 	= $dataArray[0];
$geldigWachtwoord 		= $dataArray[1];

$gebruikersnaam = "";
$paswoord = "";

//UITLOGGEN
if(isset($_GET['cookie'])){
	if ($_GET['cookie'] == 'delete') 
	{
		setcookie('authenticated','', time() - 3600 );
		setcookie('name','',time() - 3600);
		header('location: oplossing-cookies-deel3.php');
	}
}

//IF SUBMIT en LOGIN OK
if (isset($_POST['submit'])){
	if ( $_POST['username'] == $geldigeGebruikersnaam && $_POST['password'] == $geldigWachtwoord)
	{
		if (isset($_POST['remember'])){
			$expiration = 30*24*60*60 ;//30dagen
			setcookie( 'authenticated', TRUE, time() + $expiration );
			setcookie( 'name', $geldigeGebruikersnaam, time() + $expiration );
		}else{
			setcookie( 'authenticated', TRUE);
			setcookie( 'name', $geldigeGebruikersnaam );
		}	
		header( 'location: oplossing-cookies-deel3.php' );
	
	}else{
		$message	=	"Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.";
	}
}

//IF AUTHENTICATED
	if ( isset( $_COOKIE['authenticated'] ) ) 
	{
		$isAuthenticated	=	true;
		$hoofding	=	'Dashboard';
		$message	=	'Hallo '.$_COOKIE['name']. ', fijn dat je er weer bij bent.';
	}


?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>opdracht cookies deel2</title>
        
    </head>
    <body>
        <h1><?php echo $hoofding ?></h1>
        <p><?php echo $message ?></p>
	<?php if (!$isAuthenticated): ?>
		<form action="oplossing-cookies-deel3.php" method ="post">
        	<ul>
					<li>
						<label for="username">Gebruikersnaam: </label>
						<input type="text" name="username" id="username" value=<?php echo $gebruikersnaam ?>>
					</li>
					<li>
						<label for="password">Paswoord: </label>
						<input type="password" name="password" id="password" value=<?php echo $paswoord ?>>
					</li>
					<li>
						<input type="checkbox" name="remember" id="remember">
						<label for="remember">Mij onthouden</label>
					</li>
				</ul>
				
				<input type="submit" name="submit" value="query verzenden">
        </form>
    <?php else: ?> 
    	<a href="?cookie=delete">uitloggen</a>
	<?php endif ?>
        
        
    </body>
</html>