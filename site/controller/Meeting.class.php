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

	}

	public function suggest()
	{
		$valid = new Validation();

		$posted = $this->filter->post();
		$valid->setValidation(array(
			'topic_title' 	=> 'required',
			'topic_summary' => 'required'
		));

		if($this->filter->post('sub') && $valid->validate($posted)){
			$db = new Database();
			$db->insert('suggest',array(
				'title'		=> $this->filter->post('topic_title'),
				'summary'	=> $this->filter->post('topic_summary')
			));
			
		}else{
			$this->setViewData('failureMsg',$valid->getFailureMessages());
		}

	}

}

?>
