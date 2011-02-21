<?php

class Controller extends View
{
	public $useTemplate = true;

	public function __construct()
	{
		// load the user data into a view object if it's set
		if(Session::isValid()){
			$this->setViewData('userData',Session::get());
		}
	}

}

?>
