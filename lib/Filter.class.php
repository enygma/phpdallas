<?php

class Filter
{

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

	private function _filterString($data)
	{
	}

	private function _filterEmail($data)
	{
		return (filter_var($data,FILTER_VALIDATE_EMAIL)===false) ? false : true;
	}

	private function _filterInteger($data)
	{
	}

	private function _filterUrl($data)
	{
	}

}

?>
