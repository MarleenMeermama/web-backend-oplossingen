<?php

	class File
	{
		public static function returnUniqueFilename( $file )
		{
			$timestamp			=	time();
			$originalFilename	=	pathinfo( $file['name'], PATHINFO_FILENAME );
			$extension			=	explode( '/', $file['type'] )[1];
			define( 'ROOT', dirname( dirname( __FILE__ ) ) );

			$newFilename	=	$timestamp . '_' . $originalFilename . '.' . $extension;

			$absolutePathName	=	ROOT . '\img\\' . $newFilename;

			if ( file_exists( $absolutePathName ) )
			{
				$absolutePathName = self::returnUniqueFilename( $file );
			}

			return $absolutePathName;
		}
	}

?>