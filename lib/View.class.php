<?php

class View
{

	public $_viewData = array(
	);

	public function __construct()
	{
		//nothing to see here
	}

	public function setViewData($keyName,$value)
	{
		// set data to be output
		$this->_viewData[$keyName] = $value;
	}

	public function render($viewData,$filePath)
	{
		if(is_file($filePath)){
			extract($viewData);
			require_once($filePath);	
		}
	}
}

?>
