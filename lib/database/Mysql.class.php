<?php

class Database_Mysql extends Database
{

	public function __construct()
	{
		//nothing to see here
	}

	public function connect()
	{
		$arr = array(
			'database.username',
			'database.password',
			'database.name',
			'database.host'
		);
		$values = Configure::getConfigValue($arr);
		//print_r($values);		

		//TODO make the mysql connection here
	}
}

?>
