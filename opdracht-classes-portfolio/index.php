<?php 

function __autoload($className)
	{
		include_once 'classes/' . $className . '.php'; 
		
	}

	//$body 	= (isset( $_GET['page'] ) ? $_GET['page'] : 'index') . '-body.html';
	
	$page	=	new HTMLbuilder('header.partial.php', 'body.partial.php', 'footer.partial.php');

	?>