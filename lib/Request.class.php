<?php

class Request
{

	public function __construct()
	{
		//nothing to see
	}

	/**
	 * Parse out the action and method from the request
	 * @return array $uriParts
	 */
	public function parseUri()
	{
		$uriParts = explode('/',$_SERVER['QUERY_STRING']);	
		return $uriParts;
	}

	/**
	 * Autoloader method
	 * @return void
	 */
	public function autoload()
	{
		echo 'autoload';
		$uriParts = $this->parseUri();
		
	}

}

?>
