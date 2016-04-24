<?php
/*
* zakladni FCP a MVC skeleton
*/


//load config
require('app/config.php');

//nastavit error handling
require('app/error_handler.php');

//nastavit autoloading
spl_autoload_extensions('.php');
spl_autoload_register();

//start app - front controller
$app = new \app\Bootstrap();