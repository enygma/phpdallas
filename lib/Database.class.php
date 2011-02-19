<?php

/**
 * Database abstraction class, uses PDO objects
 *
 * @author Chris Cornutt <ccornutt@phpdeveloper.org>
 * @package Libraries
 */
class Database
{ 
	/**
	 * Datbase object
	 * @var object
	 */
	private $_db			= null;

	/**
	 * Connection type of current request
	 * @var string
	 */
	private $_connectionType 	= 'mysql';

	public function __construct()
	{
		//nothing to see
	}

	/**
	 * Connect to database - creates new if neede, otherwise returns
	 * (singleton)
	 *
	 * @return object $this->_db Database object
	 */
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

	/**
	 * Select values from a given table
	 *
	 * @param string $table Table name
	 * @param array $columns Columns to select
	 * @param array $where Where conditions
	 *
	 * @return array $result Fetched results
	 */
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
			$sql.=' where '.join(' and ',$where_sql);
			$prepare[':'.$column] = $value;
		}
		
		// prepare the statement
		$stmt = $db->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$stmt->execute($prepare);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $result;
	}

	/**
	 * Insert gives values into a table
	 *
	 * @param string $table Table name
	 * @param array $insertValues Values to insert into the table (associative)
	 */
	public function insert($table,$insertValues)
	{
		$db	= $this->connect();
		$sql	= 'insert into '.$table;

		$columns = array();
		$prepare = array();
		foreach($insertValues as $columnName => $value){
			$columns[]=$columnName;
			$prepare[':'.$columnName] = $value;
		}
		$sql.=' ('.implode(',',$columns).') values ('.implode(',',array_keys($prepare)).')';

		 // prepare the statement
                $stmt = $db->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $stmt->execute($prepare);
	}

}

?>
