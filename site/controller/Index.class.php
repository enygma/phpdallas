<?php

class Controller_Index extends Controller
{

	public function __controller()
	{
		//nothing to see...
	}
	
	public function index()
	{

		$db = new Database();
		$db->select('foo',array('bar'=>'baz'));

		echo 'test';
		$this->setViewData('testing',array(1,2,3));
	}

}

?>
