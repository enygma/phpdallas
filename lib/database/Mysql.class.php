<?php

class Database_Mysql extends Database
{
	private $_db	= null;

	public function __construct()
	{
		//nothing to see here
	}

	public function connect()
	{
		list($user,$pass,$name,$host) = Configure::getConfigValue(array(
			'database.username','database.password',
			'database.name','database.host'
		));
		
		$dsn = 'mysql:dbname='.$name.';host='.$host;
		
		try{
			$this->_db = new PDO($dsn,$user,$pass);
			return $this->_db;
		}catch(PDOException $e){
			throw new Exception('Database connection failure: '.$e->getMessage());
		}
	}
}

?>
