<?php

class View
{

	public $_viewData 	= array( );
	public $_viewPath 	= null;
	public $html		= null;

	public function __construct()
	{
		//nothing to see here
		$this->html = new Html();
	}

	public function setViewData($keyName,$value=null)
	{
		if(!is_array($keyName)){
			$keyName = array($keyName=>$value);
		}
		// set data to be output
		foreach($keyName as $name => $value){
			$this->_viewData[$name] = $value;
		}
	}

	public function setViewPath($viewPath)
	{
		$this->_viewPath = $viewPath;
	}

	public function render($viewData,$filePath,$useTemplate=true,$return=false)
	{
		// see if we have a template to use
		$template = new Template();
		if(is_file($filePath)){
			ob_start();
			extract($viewData);
			require_once($filePath);	
			$content = ob_get_contents();
			ob_end_clean();
		}
		$templateFile = Configure::getConfigValue('template.file');
		if($templateFile != null && $useTemplate==true){
			$templateFilePath = $this->_viewPath.'/'.$templateFile;
			require_once($templateFilePath);
		}else{
			if($return==true){ return $content; }else{ echo $content; }
		}
	}
	public function generate($viewData,$viewPath)
	{
		$viewPath = Session::get('view_path').'/'.$viewPath.'.php';
		return $this->render($viewData,$viewPath,false,true);
	}
}

?>
