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
			'email_address' => 'required|email',
			'full_name'		=> 'required'
		));
		$posted = $this->filter->post();

		if($this->filter->post('submit') && $valid->validate($posted)){
			$response 			 		= new Model_Response();
			$response->email_address 	= $this->filter->post('email_address');
			$response->full_name 		= $this->filter->post('full_name');
			$response->involve			= implode(',',$this->filter->post('involvement'));
			
			try{
				$response->create();
				$this->setViewData('success',true);
			}catch(Exception $e){
				$this->setViewData('errors',array('duplicate_entry'=>'Duplicate entry!'));
				$this->setViewData('success',false);
			}
		}else{
			$this->setViewData('errors',$valid->getFailureMessages());
		}
		$this->setViewData('posted',$this->filter->post());
	}
}
