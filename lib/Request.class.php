<?php

class Request
{
	private $_site_path 		= null;
	private $_view_path 		= null;
	private $_controller_path 	= null;
	private $_site_name		= 'site';

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
		$requestUri = str_replace('?'.$_SERVER['QUERY_STRING'],'',$_SERVER['REQUEST_URI']);
		$requestUri = str_replace(array('/index.php/','/index.php'),'',$requestUri);
		$uriParts = (empty($requestUri)) ? array('','') : explode('/',$requestUri);
		if(empty($uriParts[0])){ array_shift($uriParts); }

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
		$directoryIterator = new RecursiveDirectoryIterator($searchPath);
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
		// first try to find it in the libs
		$foundPath = $this->__findFile($className,$this->_site_path.'/lib');

		// now try to find it in the site
		if($foundPath==null){
			// see if we have a subdomain
			if($subdomain=$this->hasSubdomain()){
				$this->_controller_path = $this->_site_path.'/'.$subdomain.'/controller';
				$this->_view_path 	= $this->_site_path.'/'.$subdomain.'/view';
				$path 			= $subdomain;
			}elseif($domainMatch = $this->hasDomainMatch()){
				$this->_controller_path = $this->_site_path.'/'.$domainMatch.'/controller';
                                $this->_view_path       = $this->_site_path.'/'.$domainMatch.'/view';
				$path 			= $domainMatch;
			}else{
				$path = 'site';
			}
			$foundPath = $this->__findFile($className,$this->_site_path.'/'.$path);
		}

		if(!empty($foundPath)){
			require_once($foundPath);
		}

		Session::set('view_path',$this->_view_path);
	}
	
	/**
	 * Check in the "domains.txt" file to see if there's a match
	 */
	private function hasDomainMatch()
	{
		$domain 	= $_SERVER['HTTP_HOST'];	
		$domainsList 	= file($_SERVER['DOCUMENT_ROOT'].'/domains.txt');

		foreach($domainsList as $domainMap){
			if(strpos($domainMap,$domain.'|')!==false){
				$mapParts = explode('|',$domainMap);
				return trim($mapParts[1]);
			}
		}
		return false;	
	}

	/**
	 * Check to see if we're on a subdomain or not
	 *
	 * @return mixed Either false for base domain or the subdomain if found
	 */
	private function hasSubdomain()
	{
		$domainParts = explode('.',$_SERVER['HTTP_HOST']);
		if(count($domainParts)>2){
			return $domainParts[0];
		}else{
			return false;
		}
	}

	public function handle()
	{
		//handle the incoming request
		//pass off to controller/method

		$parseUri = $this->parseUri();
		Configure::setConfigValue('parseUri',$parseUri);

		$parseUri[0] = (!isset($parseUri[0]) || empty($parseUri[0])) ? 'index' : $parseUri[0];
		$parseUri[1] = (!isset($parseUri[1]) || empty($parseUri[1])) ? 'index' : $parseUri[1];

		$action = array_shift($parseUri);
		$method = array_shift($parseUri);	

		// load the class
		$class = 'Controller_'.ucwords(strtolower($action));
		$requestObject = new $class;

		// filter the incoming superglobals
                $requestObject->filter = new Filter();
                $requestObject->filter->importGet();
                $requestObject->filter->importPost();

		//$requestObject->$method();
		call_user_func_array(array($requestObject,$method),$parseUri);
		
		// output to our view
		$viewFile = $this->_view_path.'/'.$action.'/'.$method.'.php';

		if(is_file($viewFile)){
			$view = new View();
			$view->setViewPath($this->_view_path);
			$view->render($requestObject->_viewData,$viewFile,$requestObject->useTemplate);
		}else{
			throw new Exception('View file not found! ('.$action.'/'.$method.')');
		}
		
	}
}

?>
