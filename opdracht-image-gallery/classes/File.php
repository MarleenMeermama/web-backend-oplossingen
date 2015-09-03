<?php

	class File
	{
		public static function returnUniqueFilename( $file, $map )
		{
			$timestamp			=	time();
			$originalFilename	=	pathinfo( $file['name'], PATHINFO_FILENAME );
			$extension			=	explode( '/', $file['type'] )[1];
			

			$newFilename	=	$timestamp . '_' . $originalFilename . '.' . $extension;

			$absolutePathName	=	$map . $newFilename;

			if ( file_exists( $absolutePathName ) )
			{
				$absolutePathName = self::returnUniqueFilename( $file );
			}

			return $absolutePathName;
		}
	}

?>