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
		
		$valid = new Validation();
		
		$valid->setValidation(array(
			'meetup_name' => 'required',
			'meetup_desc' => 'required',
			'meetup_date' => 'required'
		));
		
		if($this->filter->post('sub') && $valid->validate($this->filter->post())){
			// success
			/*$meeting_date = mktime(
				0,0,0,
				$this->filter->post('meetup_name'),
				$this->filter->post('meetup_name'),
				$this->filter->post('meetup_name')
			);*/
			
			$db = new Database();
			$db->insert('meetings',array(
				'title' 		=> $this->filter->post('meetup_name'),
				'detail'		=> $this->filter->post('meetup_desc'),
				'meeting_date' 	=> $meeting_date,
				'meeup_link' 	=> $this->filter->post('meetup_link'),
			));
		}
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
