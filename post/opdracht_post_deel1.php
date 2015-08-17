<?php 
$password = 'azerty';
$username ='marleen';
$message =	"Bevestig je gegevens.";

if(isset($_POST['submit']))
{
	if(($_POST['password'] == $password) && ($_POST['username'] == $username))
	{
		$message = "Welkom";
	}else{
		$message = "Er ging iets mis bij het inloggen, probeer opnieuw.";
	}
}

 ?>

 <!doctype html>
 <html>
     <head>
         <meta charset="utf-8">
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>opdracht post </title>

        
     </head>
     <body>
       <h1>opdracht post </h1>
      
		<form action="opdracht_post_deel1.php" method="POST">
			<ul>
				<li>
					<label for="usernaam">gebruikersnaam:</label>
					<input type="text" name="username" id="username" value="marleen">
				</li>
				<li>
					<label for="password" >paswoord:</label>
					<input type="text" name="password" id="password" value="azerty">
				</li>
			</ul>
			<input type="submit" name="submit" value="Bevestig">
		</form>
		 <p><?php echo $message ?></p>

     </body>
 </html>