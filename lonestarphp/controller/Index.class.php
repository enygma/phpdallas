<?php

class Controller_Index extends Controller
{

	public function __construct()
	{
	}

	public function tmp()
	{
		$this->useTemplate = false;

		$valid = new Validation();
		$valid->setValidation(array(
			'email' => 'required|email'
		));

		$posted = $this->filter->post();

		if($this->filter->post('submit') && $valid->validate($posted)){
			$response = new Model_Response();
			$response->email_address = $this->filter->post('email');
			$response->date_submitted = time();
			$response->full_name = 'Conference Interest';
			$response->involve = 'info';

			$response->create();
			$this->setViewData('msg','Thank you for your submission! We\'ll send you the latest as planning progresses!');
		}else{
			$this->setViewData('err',$valid->getFailureMessages());
		}
	}
	public function index()
	{

		$eventData = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/assets/xml/lonestarphp-sessions.xml');

                $view = new View();
                $this->setViewData(array(
                        'schedule_block' => $view->generate(array('eventDetail'=>$eventData),'index/schedule_block'),
			'speaker_block' => $view->generate(array('eventDetail'=>$eventData),'index/speaker_block')
                ));
		$this->useTemplate = true;
	}
}

?>
