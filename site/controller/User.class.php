<?php

class Controller_User extends Controller
{

	public function __construct()
	{
		parent::__construct();
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
			
			$auth = new Auth();
			if($auth->login($this->filter->post())==true){
				
				$user = new Model_User();
				$user = $user->findSingleByUsername($this->filter->post('username'));
				
				// Set up the session
				Session::start(array(
					'username' 	=> $user['username'],
					'id' 		=> $user['ID']
				));
			}else{
				$valid->setFailureMessage('login','Invalid login!');
				return false;
			}
		}
		$this->setViewData('validationErrors',$valid->getFailureMessages());
	}

	public function signup()
	{
		// signup options - basic, twitter, facebook
	}

}

?>
