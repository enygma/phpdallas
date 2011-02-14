<?php

class Database
{ 
	private $_db			= null;
	private $_connectionType 	= 'mysql';

	public function __construct()
	{
		//nothing to see
	}

	public function connect()
	{
		$this->_connectionType = Configure::getConfigValue('database.type');
		if($this->_db === null){
			$className = 'Database_'.ucwords(strtolower($this->_connectionType));
			$connectionObject = new $className();
			$this->_db = $connectionObject->connect();
		}
		return $this->_db;
	}

	public function select($table,$where)
	{
		$db = $this->connect();
		var_dump($db);
	}

}

?>
