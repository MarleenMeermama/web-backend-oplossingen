<?php session_start();

    function __autoload( $className )
    {
        include_once( 'classes/' . $className . '.php' );
    } 

     if ( isset( $_COOKIE['login'] ) ){
       header('location: dashboard.php');
     }

	$email		=	"";
	$password	=	"";

    //reeds geregistreerd
    if ( isset( $_SESSION[ 'registration' ] ) )
		{
			$email		=	$_SESSION[ 'registration' ][ 'email' ];
			$password	=	$_SESSION[ 'registration' ][ 'password' ];
		}
 ?>

 <!DOCTYPE html>
	<html>
	<head>
		<style>
			.modal
			{
				margin:5px 0px;
				padding:5px;
				border-radius:5px;
			}	
		</style>
		<link rel="stylesheet" type="text/css" href="css/global.css">
	</head>
	<body>
		
		<h1>Inloggen</h1>

		

		  <?php if ( isset($_SESSION['notification'] )): ?>
			
				
				<div class="modal <?php echo $_SESSION['notification']['type'] ?>">
					<?php echo $_SESSION['notification']['message'] ?>
				</div>
				 
			<?php unset($_SESSION['notification']) ?>

		<?php endif ?>

		<form action="login-process.php" method="post">
			<ul>
				<li>
					<label for="email">Email</label>
					<input type="text" name="email" id="email" value="<?= $email ?>">
				</li>
				
				<li>
					<label for="password">Paswoord</label>
					<input type="text" name="password" id="password" value="<?= $password ?>">
				</li>
			</ul>
			
			<input type="submit" name="submit" value="inloggen">
		</form>
		
		<p>Nog geen login? Maak er dan eentje aan op de <a href="registratie-form.php">Registratiepagina</a></p>
		
	</body>
</html>