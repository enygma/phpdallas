<?php

class Controller_Meeting extends Controller
{

	public function __construct()
	{
	}

	public function index()
	{
		
	}

	public function add()
	{
		var_dump($this->filter->get('testing'));

		// build the form to output
		$addForm = new Form();

		$this->setViewData('addForm',$addForm);
	}

}

?>
