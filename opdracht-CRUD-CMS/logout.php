<?php

	session_start();

	function __autoload( $className )
    {
        include_once( 'classes/' . $className . '.php' );
    } 

    // var_dump( $_SESSION[ 'registration' ] );

	if ( isset( $_SESSION[ 'registration' ] ) ){
		unset( $_SESSION['registration'] );
	}
		

	setcookie( 'login', '', 0 );
		
	$_SESSION['notification']['message'] = "U bent uitgelogd. Tot de volgende keer" ;
	$_SESSION['notification']['type'] = "success";
	header( 'location: login-form.php' );

?>