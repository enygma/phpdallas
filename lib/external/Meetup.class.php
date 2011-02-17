<?php

class Meetup extends External
{
	private $_key = null;
	private $_host = 'http://api.meetup.com';
	private $_groupId = 120830; //16105151;

	public function __construct()
	{
		$this->_key = Configure::getConfigValue('meetup.key');
	}

	public function request()
	{
	}

	public function getMeetupEvents()
	{
		//$this->request();

		$location = $this->_host.'/groups.xml/?zip=75034&topic=php&order=members&key='.$this->_key;
		$location = $this->_host.'/events.xml/?sign=true&group_id='.$this->_groupId.'&status=upcoming,past&key='.$this->_key;
echo $location;

		$http = new HttpRequest($location,HttpRequest::METH_GET);
		$response = $http->send()->getBody();
	
		var_dump($response);
		return simplexml_load_string($response);
	}

}

?>
