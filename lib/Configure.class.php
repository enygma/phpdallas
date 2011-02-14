<?php

class Configure
{
	static $_configPath = '';
	static $_configFile = 'config.ini';
	static $_configValues = array();

	public static function setConfigPath()
	{
		self::$_configPath = $_SERVER['DOCUMENT_ROOT'].'/site/config';
	}
	
	public static function loadConfig()
	{
		self::setConfigPath();

		// load the INI file
		$configFilePath = self::$_configPath.'/'.self::$_configFile;
		if(is_file($configFilePath)){
			self::$_configValues = parse_ini_file($configFilePath);
		}else{
			throw new Exception('Configuration file not found!');
		}
	}

	public static function getConfigValue($configName)
	{
		return (array_key_exists($configName,self::$_configValues)) ? self::$_configValues[$configName] : null;
	}
}

?>
