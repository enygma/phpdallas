<?php

class Model
{

	protected $_currentValues = array();

	public function __construct($objectId=null)
	{
		// if we have an ID, load the object's data
	}

	public function __call($method,$args)
	{
		if(strpos(strtoupper($method),'FINDBY')===0){
			$column = str_replace('FINDBY','',strtoupper($method));
			return $this->find(array($column=>$args[0]));
		}elseif(strpos(strtoupper($method),'FINDSINGLEBY')==0){
			$column = str_replace('FINDSINGLEBY','',strtoupper($method));
			$result = $this->find(array($column=>$args[0]));
			return (isset($result[0])) ? $result[0] : null;
		}else{
			return null;
		}
	}
	
	public function __get($propertyName)
	{
		return (isset($this->_currentValues[$propertyName])) ? $this->_currentValues[$propertyName] : null;
	}
	
	protected function apply($data)
	{
		if(!empty($data)){
			foreach($data as $property => $value){
				// check our $_columns to see if the properties match
				if(array_key_exists($property,$this->_columns)){
					$this->_currentValues[$property] = $value;
				}
			}
		}
	}

	public function find($values)
	{
		$db = new Database();
		return $db->select($this->_tableName,null,$values);
	}

	public function create()
	{
		// check to see if it's required to be unique
		if($this->_unique==true){
			if(count($this->find($values))>0){
				throw new Exception('Unique constraint violated on "'.$this->_tableName.'" table.');
			}
		}
		
		$this->beforeCreate();
		
		// go through the columns list and match up the properties
		$values = array();
		foreach($this->_columns as $columnName => $columnDetail){
			if(isset($this->$columnName)){
				$values[$columnName] = $this->$columnName;
			}
		}
		
		$db = new Database();
		$db->insert($this->_tableName,$values);	
		
		$this->afterCreate();
	}
	
	public function createFromPost($postData)
	{
		// for each of the posted values, apply the properties
	}

	public function save()
	{
	}
	
	public function beforeCreate()
	{
		// placeholder
	}
	public function afterCreate()
	{
		// placeholder
	}

}

?>
