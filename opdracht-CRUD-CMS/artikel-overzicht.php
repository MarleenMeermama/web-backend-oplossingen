<?php  

$email = '';
if(isset($_SESSION['registration']['email']))
{
	$email = $_SESSION['registration']['email'];
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
        <h1>Overzicht van de artikels</h1>

         <?php if ( isset($_SESSION['notification'] )): ?>
            <div class="modal <?php echo $_SESSION['notification']['type'] ?>">
                <?php echo $_SESSION['notification']['message'] ?>
            </div>
             <?php unset($_SESSION['notification']) ?>
        <?php endif ?>

        <p>Geen artikels gevonden</p>
			
		<a href="artikel-toevoegen-form.php">Voeg een artikel toe</a>

    </body>
</html>