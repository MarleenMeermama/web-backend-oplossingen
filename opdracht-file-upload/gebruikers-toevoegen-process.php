<?php

	session_start();

	function __autoload( $className )
	{
		include_once( 'classes/' . $className . '.php' );
	}

	// Controle wanneer iemand op submit (=gebruiker toevoegen) heeft gedrukt
	$emailValid = FALSE;
	$bestandValid = FALSE;

	try 
	{

		if ( isset( $_POST[ 'submit' ] ) )
		{
			// controle email

				$db	=	new Database( 'mysql', 'localhost', 'opdracht_file_upload', 'root', '' );

				// Maak een nieuwe instantie van de klasse User aan en geef hier de DB aan mee
				// "Dependency injection" van database klasse
				$user = new User( $db );

				// Controleren of de user al bestaat
				$userExists = $user->exists( $email );


				// Als de user bestaat, errormessage tonen en redirecten
				if ( $userExists === TRUE )
				{
					Message::setMessage( "Deze gebruiker bestaat al, probeer een ander e-mailadres", "error" );
					Helper::redirect( 'gebruikers-toevoegen-form.php' );
				}
				else // Bestaat de gebruiker nog niet, maak de gebruiker aan na controle geldigheid bestand
				{
					$emailValid = TRUE;
				}

		// controle file
			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/png"))
			&& ($_FILES["file"]["size"] < 2000000)) 
			{

			// Het bestand moet gif, jpeg of png zijn en mag niet groter zijn dan 2MB
			  
				if ($_FILES["file"]["error"] > 0) 
				{
					// Als er een fout in het bestand wordt gevonden (bv. corrupte file door onderbroken upload), moet er een foutboodschap getoond worden
					throw new Exception( "Return Code: " . $_FILES["file"]["error"] );
					Helper::redirect('gebruikers-toevoegen-form.php');

				} 
				else 
				{
					// De root van het bestand moet achterhaald worden om de absolute pathnaam (de plaats op de schijf van de server) te achterhalen
					// Zo weet de server waar het bestand moet terecht komen.
					// We kunnen dit doen door de functie dirname() toe te passen op dit bestand (=__FILE__)
					define('ROOT', dirname(__FILE__));

					$bestandsnaam = ROOT . "/img/" . $_FILES["file"]["name"];

					if (file_exists($bestandsnaam)) {
						
						//Als het bestand reeds bestaat in de map, moet er een foutboodschap getoond worden
						throw new Exception( $_FILES["file"]["name"] . " bestaat al. " );
						Helper::redirect('gebruikers-toevoegen-form.php');

					} 
					else 
					{  //Anders mag het bestand geüpload worden naar de map
						$bestandValid = TRUE;
						
					}
				}
			} 
		
			else 
			{
				throw new Exception( 'Ongeldig bestand' );
				Helper::redirect('gebruikers-toevoegen-form.php');
			}

			if ($bestandValid && $emailValid){
				//bestand geüpload worden naar de map
				move_uploaded_file($_FILES["file"]["tmp_name"], $bestandsnaam);
				//db invullen
				$user->createFotoGebruiker( $email, $bestandsnaam );
				//SESSION invullen
				$_SESSION['user']['bestand'] = $_FILES["file"]["name"];
				$_SESSION['user']['email'] = $email;
				// Redirecten gegevens bewerken
				Helper::redirect( 'gegevens-wijzigen-form.php' );
			}

		} 
		
	}
	catch (Exception $e) 
	{
		Message::setMessage( $e->getMessage(), 'error' );
	}

	


?>