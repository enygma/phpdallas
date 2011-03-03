<?php

class Controller_News extends Controller
{

	public function __construct()
	{
	}

	public function index()
	{
		//$this->useTemplate = false;

		$newsData = array(
			'title' 	=> 'The Search Continues',
			'content'	=> 'Testing ones two three',
			'date_posted'	=> time(),
			'author'	=> 'chris'
		);
		$this->setViewData('news',$newsData);
	}
}

?>
