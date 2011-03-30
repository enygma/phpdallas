<?php
error_reporting(0);
session_start();

// set up an autoloader
require_once('lib/Request.class.php');
$request 	= new Request();

spl_autoload_register(array($request,'autoload'));
Configure::loadConfig();

// request handling!
$request->handle();

?>
