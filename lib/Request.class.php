<?php

class Request
{
	private $_site_path 		= null;
	private $_view_path 		= null;
	private $_controller_path 	= null;

	public function __construct()
	{
		//nothing to see
		$this->_site_path 	= $_SERVER['DOCUMENT_ROOT'];
		$this->_controller_path = $this->_site_path.'/site/controllers';
		$this->_view_path 	= $this->_site_path.'/site/view';
	}

	/**
	 * Parse out the action and method from the request
	 *
	 * @return array $uriParts
	 */
	public function parseUri()
	{
		$requestUri = $_SERVER['REQUEST_URI'];
		$requestUri = str_replace('/index.php/','',$requestUri);
		$uriParts = (empty($requestUri)) ? array('','') : explode('/',$requestUri);

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
		$directoryIterator = new RecursiveDirectoryIterator($this->_site_path);
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
		$viewFile = $this->_view_path.'/'.$action.'/'.$method.'.php';

		if(is_file($viewFile)){
			$view = new View();
			$view->render($requestObject->_viewData,$viewFile);
		}else{
			throw new Exception('View file not found! ('.$action.'/'.$method.')');
		}
		
	}
}

?>
