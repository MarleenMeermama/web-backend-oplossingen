<?php 

	class Database
	{
		private $databaseInstantie;

		public function __construct( $databaseType,
										$databaseHost,
										$databaseNaam, 
										$username, 
										$password )
		{
			$this->databaseInstantie = new PDO( $databaseType . ':host=' . $databaseHost . ';dbname=' . $databaseNaam, $username, $password  );
		}

		public function query( $queryString, $placeholders = FALSE )
		{
			$statement = $this->databaseInstantie->prepare( $queryString );

			// Nog uitwerken voor prepared statements
			if ( $placeholders )
			{
				foreach( $placeholders as $placeholderName => $placeholderValue )
				{
					$statement->bindValue( $placeholderName, $placeholderValue );
				}
			}


			$container['execute'] = $statement->execute();

			$result = $this->returnArray( $statement );

			$container['result'] = $result;

			return $container;
		}

		public function returnArray( $statement )
		{
			$container	=	array();

			while( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
			{
				$container[] = $row;
			}

			return $container;
		}
	}

?>