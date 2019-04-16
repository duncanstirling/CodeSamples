<?php

 /**
  * Display all errors when APPLICATION_ENV is development.
  */



$basedir = __DIR__;
define('BASEDIR', "$basedir");
define('LIBDIR', "$basedir/../vendor/");

ini_set('include_path', ini_get('include_path').':'.LIBDIR.'MyLibrary/library');
$initial_path = ini_get('include_path');

define('APPLICATION_ENV', "development");
#echo "Zend engine version:" . zend_version();
$env = getenv('APPLICATION_ENV') ?: 'development';

/*if(isset($_SERVER['APPLICATION_ENV'])){
    if ($_SERVER['APPLICATION_ENV'] == 'development') {
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    }
}else{
    echo "APPLICATION_ENV has not been set<br />";
    # may want to remove this if its production
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}*/

#echo "...appliction environment is $env<br />";

if(isset($env)){
	if ($env == 'development') {
		error_reporting(E_ALL);
		ini_set("display_errors", 1);
	}
}else{
	echo "APPLICATION_ENV has not been set<br />";
	# may want to remove this if its production
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
} 
ini_set("display_errors", 0);
 
 /**
  * This makes our life easier when dealing with paths. Everything is relative
  * to the application root now.
  */
#  echo __DIR__;
# exit; #fixme remove 
  
 chdir(dirname(__DIR__));

 #echo __DIR__;
 #exit; #fixme remove
 
 
 // Decline static file requests back to the PHP built-in webserver
 #if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
 #    return false;
 #}

 // Setup autoloading
 require 'init_autoloader.php';

 

 
 
 // Run the application!
 Zend\Mvc\Application::init(require 'config/application.config.php')->run();
 
 
 