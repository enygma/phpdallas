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
		// build the form to output
		$addForm = new Form();

		$this->setViewData('addForm',$addForm);
	}

}

?>
