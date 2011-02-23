<?php

class Model_Response extends Model
{

	protected $_tableName 	= 'response';
	//protected $_unique		= true;

	public $_columns = array(
		'email_address' => array('type'=>'string','length'=>100),
		'full_name'		=> array('type'=>'string','length'=>200),
		'date_submitted'=> array('type'=>'timestamp'),
		'id'			=> array('type'=>'integer','primary_key'=>true),
		'involve'		=> array('type'=>'string','length'=>200)
	);

	public function __construct()
	{
		//nothing to see...
	}

	public function beforeCreate()
	{
		$this->date_submitted = time();
	}
}

?>
