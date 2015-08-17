<?php 
$password = 'azerty';
$username ='marleen';
$message =	"Bevestig je gegevens.";
$inlogOK = false;
$usernameForm = '';

if(isset($_POST['submit'])){

	$usernameForm = $_POST['username'];
	$passwordForm = $_POST['password'];
	
	if ( $usernameForm === $username && $passwordForm === $password )
        {
            $inlogOK 	= 	true;
            $message    =   'Welkom';
        }
        else
        {
            $message    =   'Er ging iets mis bij het inloggen, probeer opnieuw';
        }




}

 ?>

 <!doctype html>
 <html>
     <head>
         <meta charset="utf-8">
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>opdracht post thuis</title>

        
     </head>
     <body>
       <h1>opdracht post thuis</h1>
      	<h2>inloggen</h2>
		<form action="oplossing-post-thuis.php" method="POST">
			<ul>
				<li>
					<label for="usernaam">gebruikersnaam:</label>
					<input type="text" name="username" id="username" value = <?= $usernameForm ?>>
				</li>
				<li>
					<label for="password" >paswoord:</label>
					<input type="password" name="password" id="password" value="">
				</li>
			</ul>
			<input type="submit" name="submit" value="Bevestig">
		</form>
		 <p><?php echo $message ?></p>

     </body>
 </html>