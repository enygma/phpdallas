<?php

class UserModel extends Model
{
	protected $_tableName = 'users';

	public $_columns = array(
		'username' 	=> array('type' => 'string','length' => 50),
		'password' 	=> array('type' => 'string','length' => 40),
		'email'		=> array('type' => 'string','length' => 100),
		'full_name'	=> array('type' => 'string','length' => 100),
		'id'		=> array('type' => 'integer','primary_key' => true)
	);

	public function __construct($userId=null)
	{
		if($userId!=null){
			$user = $this->findById($userId);
			print_r($user);
		}	
	}
}

?>
