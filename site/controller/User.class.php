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

		$this->useTemplate = false;

		$user = new Model_User();
                $user->username = 'test';
                $user->password = 'here';
                $user->full_name = 'full name';
                $user->email    = 'me@me.com';
                //$user->create();

		$user = new Model_User(1);
		echo '<hr/><pre>'; var_dump($user); echo '</pre>';
		echo 'user: '.$user->username;

		return true;

		$this->useTemplate = false;
		$valid 	= new Validaton();
		$posted = $this->filter->post();

		$valid->setValidation(array(
			'username' 	=> 'required',
			'password' 	=> 'required',
			'full_name'	=> 'required',
			'email' 	=> 'required|email'
		));

		if($this->filter->post('sub') && $valid->validate($posted)){
			$user = new UserModel();

			$user->username = $this->filter->post('username');
			$user->password = $this->filter->post('password');
			$user->full_name = $this->filter->post('full_name');
			$user->email	= $this->filter->post('email');

			$user->create();

			/*
			$db = new Database();
			$db->insert('users',array(
				'username'	=> $this->filter->post('username'),
				'password'	=> md5($this->filter->post('password')),
				'full_name'	=> $this->filter->post('full_name'),
				'email'		=> $this->filter->post('email')
			);
			*/
		}
	}

	public function login()
	{
		$this->useTemplate = false;
		$valid 	= new Validation();
		$posted = $this->filter->post();

	}

	public function signup()
	{
		// signup options - basic, twitter, facebook
	}

}

?>
