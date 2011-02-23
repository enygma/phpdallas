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

		$db 		= new Database();
		$all 		= $db->select('response');
		$sections 	= array();

		foreach($all as $contact){
			foreach(explode(',',$contact['involve']) as $involve){
				if($involve==''){ continue; }
				if(array_key_exists($involve,$sections)){
					$sections[$involve]++;
				}else{
					$sections[$involve] = 1;
				}
			}
		}
		$sections['total_responses'] = count($all);
		echo '<!-- '; print_r($sections); echo '-->';

		if($this->filter->post('submit') && $valid->validate($posted)){
			$response 			 		= new Model_Response();
			$response->email_address 	= $this->filter->post('email_address');
			$response->full_name 		= $this->filter->post('full_name');

			$involve = $this->filter->post('involvement');
			if(!empty($involve)){
				$response->involve			= implode(',',$this->filter->post('involvement'));
			
			}
			
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
