<?php

// set up an autoloader
require_once('lib/Request.class.php');
$request = new Request();
spl_autoload_register(array($request,'autoload'));

// request handling!
$request->handle();

?>
