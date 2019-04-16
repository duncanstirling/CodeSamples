<?php

$domainName = (string)$_SERVER['HTTP_HOST'];
/* - the following has been put in public/index.php
if($_SERVER["HTTPS"] != "on")
{
	//echo $_SERVER["HTTP_HOST"];	
	$_SERVER["HTTP_HOST"] = str_replace('www.', '', $_SERVER["HTTP_HOST"]);
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
//===================================================================================
// REDIRECT SO NOT LOOKING AT SHIREFRESH

if(	strpos($domainName, 'shirefresh.') !== false){
    header("Location: https://suitsdating.com");
    exit();
}*/
//===================================================================================
// ADJUST TITLE WIDTH
			
if(	strpos($domainName, 'nternationals.') !== false || strpos($domainName, 'onight.') !== false || strpos($domainName, 'enior.') !== false 
|| strpos($domainName, 'rofessional') !== false
|| strpos($domainName, 'activeseniorsingles.') !== false){
	define("BROAD_TITLE", 'true');
	define("MOBILE_FONT_HEADER", '21px');
}else{
	define("BROAD_TITLE", 'false');
	define("MOBILE_FONT_HEADER", '23px');
}	

//===================================================================================
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

# http://stackoverflow.com/questions/14003187/configure-multiple-databases-in-zf2

/*
return array(
		'dbconfigkey1' => array(
				'driver'         => 'Pdo',
				'dsn'            => 'mysql:dbname=zf2tutorial;host=dbrw.staging.eseye.net',
				'driver_options' => array(
						PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
				),

    		    'username' => 'dstirling',
    		    'password' => 'dstirling@eseye.comSecret',		    
		),

		'dbconfigkey2' => array(
				'driver'         => 'Pdo',
				'dsn'            => 'mysql:dbname=zf2tutorial;host=dbrw.staging.eseye.net',
				'driver_options' => array(
						PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
				),
				
    		    'username' => 'dstirling',
    		    'password' => 'dstirling@eseye.comSecret',
		),
		'service_manager' => array(
				'factories' => array(
						'Zend\Db\Adapter\Adapter'
						=> 'Zend\Db\Adapter\AdapterServiceFactory',		
						'dbconfigkey1' => 'Zend\Db\Adapter\AdapterServiceFactory'
								    
#	                    'dbconfigkey1' => function($sm) {
#    				    	$config = $sm->get('Config');
#    				    	#return new Adapter($config['dbconfigkey1']);
#    				    	return new Zend\Db\Adapter\AdapterServiceFactory($config['dbconfigkey1']);
#	                    }, 
	                    
				),
		),		
);
*/

$mystring = php_uname('name');
if (strpos($mystring, 'ovh') !== false) {
	# PRODUCTION
	$host     = 'mysql51-135.perso';
}else{
	# DEV
	$host     = '127.0.0.1';
}

//$host     = 'localhost';
$dbname   = 'shirefreauvista';		
#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
#if (strpos($mystring, 'ovh') !== false) {
	# PRODUCTION

    return array(    
        'phpSettings' => array(
    		'display_startup_errors'     => true,
    		'display_errors'             => true,
    		'max_execution_time'         => 60,
    		'date.timezone'              => 'UTC',
    		'mbstring.internal_encoding' => 'UTF-8',
        ),    
    
        'adapter1' => array(
			'driver'  => 'Pdo',
			'dsn'     => 'mysql:dbname='.$dbname.';host='.$host,
			'driver_options' => array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
			), 
        )
        
        
        
/*        
        ,
        'adapter2' => array(
    		'driver'  => 'Pdo',
    		'dsn'     => 'mysql:dbname='.$dbname.';host='.$host,
    		'driver_options' => array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
    		),
        ), 
        'adapterTblLookUp' => array(  
    		'driver'  => 'Pdo',
    		#'dsn'    => 'mysql:dbname=tftpserver;host=dbrw.redstation.eseye.net',
    		'dsn'     => 'mysql:dbname='.$dbname.';host='.$host,
    		'driver_options' => array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
    		),
        ),
		'db' => array(
		    'adapters'=>array(
    		    'adapterPoll' => array(
        			'driver'  => 'Pdo',
        			'dsn'     => 'mysql:dbname='.$dbname.';host='.$host,
        			'driver_options' => array(
    					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        			),    
                ),
                'adapterCourses'     => array(
            		'driver'         => 'Pdo',
            		'dsn'            => 'mysql:dbname='.$dbname.';host='.$host,
            		'driver_options' => array(
        				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
            		),
                ),    
            )
		),	
*/		
    );
#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@    
#}else{
# 
#	define('CONSTANT_ENVIRONMENT', 'undefined');
#	echo "Error: missing *GLOBAL* configuration for $mystring, to run this on $mystring you must first create valid configuration in autoload/global.php.";
#	exit;
#} 


      
/*
 return array(
 		'dbconfigkey1' => array(
			'driver'         => 'Pdo',
			'dsn'            => 'mysql:dbname=zf2tutorial;host=dbrw.staging.eseye.net',
			'driver_options' => array(
					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
			),
			'username' => 'dstirling',
			'password' => 'dstirling@eseye.comSecret',
 		),
 
 		'dbconfigkey2' => array(
			'driver'         => 'Pdo',
			'dsn'            => 'mysql:dbname=zf2tutorial;host=dbrw.staging.eseye.net',
			'driver_options' => array(
					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
			),
			'username' => 'dstirling',
			'password' => 'dstirling@eseye.comSecret',
 		),
 		'service_manager' => array(
 				'factories' => array(
 						'Zend\Db\Adapter\Adapter'
 						=> 'Zend\Db\Adapter\AdapterServiceFactory',
 				),
 		), 		
 );
*/



/*
 'service_manager' => array(
 		// for primary db adapter that called
 		// by $sm->get('Zend\Db\Adapter\Adapter')
 		'factories' => array(
 				'Zend\Db\Adapter\Adapter'
 				=> 'Zend\Db\Adapter\AdapterServiceFactory',
 		),
 		// to allow other adapter to be called by
 		// $sm->get('db1') or $sm->get('db2') based on the adapters config.
 		'abstract_factories' => array(
 				'Zend\Db\Adapter\AdapterAbstractServiceFactory',
 		),
 ),
*/

























 