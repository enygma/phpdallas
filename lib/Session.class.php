<?php

class Session
{

	public function __construct()
	{
		//nothing to see here
	}

	public function login($type='basic',$userData)
	{
		$method = 'login'.ucwords(strtolower($type));
		if(method_exists($method)){
			return $this->$method($userData);
		}else{
			// see if we can find one in our dir
			$class = 'Login'.ucwords(strtolower($type));
			$login = new $class();
			$login->login($userData);
		}
	}

	//--------------------

	public function loginBasic($userData)
	{
		list($username,$password) = $userData;
	}

}

?>
