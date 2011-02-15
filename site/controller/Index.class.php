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
		$meetingResult = $db->select('meetings',null,array('title'=>'test meeting'));

		$this->setViewData('testing',array(1,2,3));
	}

}

?>
