<?php

class Request
{

	public function __construct()
	{
		//nothing to see
	}

	/**
	 * Parse out the action and method from the request
	 *
	 * @return array $uriParts
	 */
	public function parseUri()
	{
		$uriParts = explode('/',$_SERVER['QUERY_STRING']);	
		return $uriParts;
	}

	/**
	 * Autoloader method
	 *
	 * @return void
	 */
	public function autoload()
	{
		echo 'autoload';
		
	}

	public function handle()
	{
		//handle the incoming request
		//pass off to controller/method

		list($action,$method) = $this->parseUri();
		

		// load the class
		$class = 'Controller_'.ucwords(strtolower($action));
		$requestObject = new $$class;
		$requestObject->$method();
		
	}
}

?>
