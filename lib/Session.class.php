<?php

class Session
{
	static $_sessionKey = 'default';

	public function __construct()
	{
		//nothing to see here
	}
	
	public static function start($data)
	{
		foreach($data as $index => $value){
			$_SESSION[self::$_sessionKey][strtoupper($index)] = $value;
		}
	}
	public static function stop()
	{
		unset($_SESSION[self::$_sessionKey]);
	}
	public static function isValid()
	{
		return (isset($_SESSION[self::$_sessionKey])) ? true : false;
	}
	public static function get($keyName=null)
	{
		if($keyName==null){
			// return everything
			return (isset($_SESSION[self::$_sessionKey])) ? $_SESSION[self::$_sessionKey] : null;
		}else{
			$keyName = strtoupper($keyName);
			return (isset($_SESSION[self::$_sessionKey][$keyName])) ? $_SESSION[self::$_sessionKey][$keyName] : null;
		}
	}

}

?>
