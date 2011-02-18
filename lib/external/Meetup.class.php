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

	public function getPastMeetupEvents()
	{
		//$this->request();

		$location = $this->_host.'/groups.xml/?zip=75034&topic=php&order=members&key='.$this->_key;
		$location = $this->_host.'/groups.xml/?id='.$this->_groupId.'&status=upcoming,past&key='.$this->_key;
		$location = $this->_host.'/2/events.xml/?&group_urlname=dallasphp&status=past&key='.$this->_key;
echo $location;

		//$location = $this->_host.'/events.xml?id=16105151&key='.$this->_key;

		$http = new HttpRequest($location,HttpRequest::METH_GET);
		$response = $http->send()->getBody();
	
		//var_dump($response);
		//echo '<br/><br/>'.htmlspecialchars($response).'<br/><br/>';
		
		return simplexml_load_string($response);
	}

}

?>
