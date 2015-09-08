

<?php


	function __autoload( $classname )
	{
		var_dump($classname);
		require_once( 'classes\\'.$classname . '.php' );
	}


	if ( isset ( $_GET['hook'] ) )
	{
		$rawHookString 	=	trim( $_GET['hook'], '/' );
		$rawHookArray	=	explode('/', $rawHookString);

		
		$controller = array_shift( $rawHookArray ); // controller is eerste, rawHookArray is rest
		// var_dump($controller);
		$classnameController = ucfirst($controller);
		var_dump($rawHookArray);
		// var_dump($classnameController);

		$controllerInstance = new $classnameController( $rawHookArray );
		var_dump($controllerInstance);

		$controllerInstance->$rawHookArray[0]();
	}
	else
	{
		

	}

	
	

?>
