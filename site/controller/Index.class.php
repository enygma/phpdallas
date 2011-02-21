<?php

class Controller_Index extends Controller
{

	public function __controller()
	{
		//nothing to see...
		parent::__construct();
	}
	
	public function index()
	{	
		$db = new Database();
		$meetingResult = $db->select('meetings',null,array('title'=>'test meeting'));

		// try out the validation/filtering
		$validate = new Validation();

		$validate->setValidation(array(
			'testField'=>'string|email'
		));

		$validate->validate(array(
			'testField'=>'me@mecom'
		));
		

		$this->setViewData('testing',array(1,2,3));
	}

	public function meetup()
	{
		$this->useTemplate = false;
		
		// get the listing of meetups
		$meetup = new Meetup();
		$events = $meetup->getPastMeetupEvents();
		
		//echo '<pre>'; var_dump($events); echo '</pre>';

		foreach($events->items->item as $event){
			//echo $event->name.'<br/>';
		}
	}

}

?>
