<?php

class Controller_Meeting extends Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$db = new Database();
		$this->setViewData('meetings',$db->select('meetings',null,null,'meeting_date desc'));
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
		
		if($this->filter->post('submit') && $valid->validate($this->filter->post())){
			
			$meeting_date = mktime(
				$this->filter->post('meetup_time_hr'),
				$this->filter->post('meetup_time_min'),
				$this->filter->post('meetup_time_sec'),
				$this->filter->post('meetup_date_mo'),
				$this->filter->post('meetup_date_day'),
				$this->filter->post('meetup_date_yr')
			);
			
			$db = new Database();
			$db->insert('meetings',array(
				'title' 		=> $this->filter->post('meetup_name'),
				'detail'		=> $this->filter->post('meetup_desc'),
				'speaker'		=> $this->filter->post('meetup_speaker'),
				'meeting_date' 	=> $meeting_date,
				'meetup_link' 	=> $this->filter->post('meetup_link'),
			));
		}else{
			echo 'fail';
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
