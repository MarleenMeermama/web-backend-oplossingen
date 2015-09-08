<?php 



class Bieren
{
	public function __construct($controllerArray)
			{

				var_dump( 'hallo vanuit constructor van bieren' );

			}

	public function delete()
	{
		var_dump("hallo vanuit de delete method van bieren");
	}

	public function insert()
	{
		var_dump("hallo vanuit de insert method van bieren");
	}

	public function update()
	{
		var_dump("hallo vanuit de update method van bieren");
	}

	public function overview()
	{
		var_dump("hallo vanuit de overview method van bieren");
	}
// call_user_func( array($obj,$func), $params ) 


}
	


 ?>