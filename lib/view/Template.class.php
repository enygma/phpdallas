<?php

class Template extends View
{
	private $_templateFile = null;

	public function __construct()
	{
		//nothing to see...
	}

	public function setTemplate($filePath)
	{
		$this->_templateFile = $filePath;	
	}

	public function render($viewContent)
	{
	}

}

?>
