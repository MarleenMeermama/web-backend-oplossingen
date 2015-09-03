<?php 

session_start();

    function __autoload( $className )
    {
        include_once( 'classes/' . $className . '.php' );
    }

    if ( isset( $_COOKIE['login'] ) ){
        header('location: dashboard.php');
     }

    $email = "";
    $password = "";


    if ( isset( $_SESSION[ 'registration' ] ) )
    {
        $email      =   $_SESSION[ 'registration' ][ 'email' ];
        $password   =   $_SESSION[ 'registration' ][ 'password' ];
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>opdracht security login</title>
        <link rel="stylesheet" href="css/global.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
    	<h1>Registreren</h1>

        <?php if ( isset($_SESSION['notification'] )): ?>
            <div class="modal <?php echo $_SESSION['notification']['type'] ?>">
                <?php echo $_SESSION['notification']['message'] ?>
            </div>
            <?php unset($_SESSION['notification']) ?>
        <?php endif ?>

    	<form action= "registratie-process.php" method="post">
			<ul>
				<li>
					<label for="email">Email</label>
					<input type="text" name="email" id="email" value="<?= $email ?>">
				</li>
				
				<li>
					<label for="password">Paswoord</label>
					<input type="text" name="password" id="password" value="<?= $password ?>">
					<button name="genereerPaswoord">Genereer paswoord</button>
				</li>
			</ul>
			
			<input type="submit" name="submit" value="log in">
		</form>
        
    </body>
</html>