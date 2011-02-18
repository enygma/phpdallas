<?php

class Model
{

	private $_currentValues = array();

	public function __construct($objectId=null)
	{
		// if we have an ID, load the object's data
	}

	public function __call($method,$args)
	{
		if(strpos('findBy',$method)==0){
			$column = str_replace('FINDBY','',strtoupper($method));
			return $this->find(array('ID'=>$args[0]));
		}
	}

	public function find($values)
	{
		$db = new Database();
		return $db->select($this->_tableName,null,$values);
	}

	public function create()
	{
		// go through the columns list and match up the properties
		$values = array();
		foreach($this->_columns as $columnName => $columnDetail){
			if(isset($this->$columnName)){
				$values[$columnName] = $this->$columnName;
			}
		}
		$db = new Database();
		$db->insert($this->_tableName,$values);	
	}

	public function save()
	{
	}

}

?>
