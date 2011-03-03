<?php

class Filter
{

	private $_getValues 	= array();
	private $_postValues 	= array();

	public function __construct()
	{
		//nothing to see here
	}

	public function filter($data,$type)
	{
		//filters down the given data based on the type
		//uses the filter extension: http://us3.php.net/manual/en/book.filter.php
		$method = '_filter'.ucwords(strtolower($type));
		if(method_exists($this,$method)){
			return $this->$method($data);
		}else{
			echo 'validation method for "'.$type.'" does not exist';
		}
	}
	public function importGet()
	{
		$this->_getValues = $_GET;
		unset($_GET);
	}
	public function importPost()
	{
		$this->_postValues = $_POST;
		unset($_POST);
	}
	public function get($keyName=null)
	{
		if($keyName==null){ return $this->_getValues; }
		return (isset($this->_getValues[$keyName])) ? $this->_getValues[$keyName] : null;	
	}
	public function post($keyName=null)
	{
		if($keyName==null){ return $this->_postValues; }
		return (isset($this->_postValues[$keyName])) ? $this->_postValues[$keyName] : null;
	}

	//-----------------------------

	private function _filterString($data)
	{
	}

	private function _filterEmail($data)
	{
		return (filter_var($data,FILTER_VALIDATE_EMAIL)===false) ? false : true;
	}

	private function _filterInteger($data)
	{
		if(!preg_match('/[0-9]+/',$data)){ return false; }else{ $data = abs($data); }
		return (filter_var($data,FILTER_VALIDATE_INT)==false) ? false : true;
	}

	private function _filterUrl($data)
	{
	}

}

?>
