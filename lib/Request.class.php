<?php

class Request
{
	private $_site_path;

	public function __construct()
	{
		//nothing to see
		$this->_site_path = $_SERVER['DOCUMENT_ROOT'].'/site/controllers';
	}

	/**
	 * Parse out the action and method from the request
	 *
	 * @return array $uriParts
	 */
	public function parseUri()
	{
		$uriParts = (empty($_SERVER['QUERY_STRING'])) ? array('','') : explode('/',$_SERVER['QUERY_STRING']);
		return $uriParts;
	}
	
	private function __findFile($className,$searchPath=null)
	{	
		$foundPath		= null;
		$classNameParts = explode('_',$className);
		if(count($classNameParts)>1){
			$findPath = $classNameParts[0].'/'.$classNameParts[1].'.class.php';
		}else{
			$findPath = $classNameParts[0].'.class.php';
		}
		
		// look through our directories
		$directoryIterator = new RecursiveDirectoryIterator($_SERVER['DOCUMENT_ROOT']);
		foreach(new RecursiveIteratorIterator($directoryIterator) as $file){
			$currentPath = $file->getPath().'/'.$file->getFilename();
			
			if(strtolower(substr($currentPath,'-'.strlen($findPath))) == strtolower($findPath)){
				$foundPath = $currentPath;
			}
		};
		return $foundPath;
	}

	/**
	 * Autoloader method
	 *
	 * @return void
	 */
	public function autoload($className)
	{
		$foundPath = $this->__findFile($className);
		require_once($foundPath);
	}

	public function handle()
	{
		//handle the incoming request
		//pass off to controller/method

		list($action,$method) = $this->parseUri();

		if(empty($action)){ $action = 'index'; }
		if(empty($method)){ $method = 'index'; }

		// load the class
		$class = 'Controller_'.ucwords(strtolower($action));
		$requestObject = new $class;
		$requestObject->$method();
		
		// output to our view
		
	}
}

?>
