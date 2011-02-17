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

	public function setViewData($keyName,$value)
	{
		// set data to be output
		$this->_viewData[$keyName] = $value;
	}

	public function setViewPath($viewPath)
	{
		$this->_viewPath = $viewPath;
	}

	public function render($viewData,$filePath,$useTemplate=true)
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
			echo $content;
		}
	}
}

?>
