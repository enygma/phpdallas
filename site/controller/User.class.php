<?php

class Controller_User extends Controller
{

	public function __construct()
	{
		//nothing to see here...
	}

	public function index()
	{
	}

	public function create()
	{
		$valid 	= new Validation();
		$posted = $this->filter->post();

		$valid->setValidation(array(
			'username' 	=> 'required',
			'password' 	=> 'required',
			'full_name'	=> 'required',
			'email' 	=> 'required|email'
		));

		if($this->filter->post('submit') && $valid->validate($posted)){
			
			$user = new Model_User();

			$user->username = $this->filter->post('username');
			$user->password = $this->filter->post('password');
			$user->full_name = $this->filter->post('full_name');
			$user->email	= $this->filter->post('email');

			$user->create();
		}else{
			$this->setViewData('validationErrors',$valid->getFailureMessages());
		}
	}

	public function login()
	{
		$valid 	= new Validation();
		$posted = $this->filter->post();
		$this->useTemplate = false;
		
		if($this->filter->post('submit') && $valid->validate($posted)){
			$user 	= new Model_User();
			$result = $user->findSingleByUsername($this->filter->post('username'));

			if($result!=null && md5($posted['password'])==$result['password']){
				echo 'pass';
				// set up the session and forward
			}else{
				echo 'fail';
			}
		}else{
			$this->setViewData('validationErrors',$valid->getFailureMessages());
		}
	}

	public function signup()
	{
		// signup options - basic, twitter, facebook
	}

}

?>
