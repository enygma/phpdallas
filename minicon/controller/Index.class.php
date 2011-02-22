<?php

class Controller_Index extends Controller
{

	public function __construct()
	{
		//nothing to see...
	}

	public function index()
	{
		$valid = new Validation();
		$valid->setValidation(array(
			'email_address' => 'required|email'
		));
		$posted = $this->filter->post();

		if($this->filter->post('submit') && $valid->validate($posted)){
			echo 'success';
		}else{
			$this->setViewData('errors',$valid->getFailureMessages());
		}
	}
}
