<?php

class Controller_Index extends Controller
{

	public function __controller()
	{
		//nothing to see...
	}
	
	public function index()
	{
		echo 'test';
		$this->setViewData('testing',array(1,2,3));
		
	}

}

?>
