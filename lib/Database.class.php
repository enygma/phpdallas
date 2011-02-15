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

	public function select($table,$columns=null,$where=null)
	{
		$db 		= $this->connect();
		$columns 	= ($columns===null) ? array('*') : $columns;
		$sql 		= 'select '.join(',',$columns).' from '.$table;
		$prepare	= array();

		if($where!==null){			
			$where_sql=array();
			foreach($where as $column => $value){
				$where_sql[]=$column.'=:'.$column;
			}
			$sql.=' '.join(' and ',$where_sql);
			$prepare[$column] = $value;
		}
		
		echo $sql;
		
		// prepare the statement
		$stmt = $db->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute($prepare);
		$result = $stmt->fetchAll();
		
		var_dump($result);
	}

}

?>
