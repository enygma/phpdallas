<?php

class LoginTwitter extends Session
{
	private $_twitter = null;

	public function __construct()
	{
		// noting to see here
		$this->_twitter = new Twitter();
	}

	public function login($userData)
	{
		print_r($userData);
	}

}

?>
