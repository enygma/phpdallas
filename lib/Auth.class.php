<?php

class Auth
{

	public function __construct()
	{
		//nothing to see here
	}

	public function login($loginData,$authType='basic')
	{
		$methodName = 'auth'.ucwords(strtolower($authType));
		if(method_exists($this,$methodName)){
			return $this->$methodName($loginData);
		}else{
			throw new Exception('Authentication type not supported!');
		}
	}
	
	//----------------
	
	public function authBasic($loginData)
	{
		// we're expecting a username/password combo
		$user 	= new Model_User();
		$result = $user->findSingleByUsername($loginData['username']);

		return ($result!=null && md5($loginData['password'])==$result['password']) ? true : false;
	}
}

?>
