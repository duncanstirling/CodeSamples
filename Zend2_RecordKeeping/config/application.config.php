<?php

# http://localhost/zend2TestProject/public/album/index
# or http://localhost/zend2TestProject/public/album

$env = getenv('APPLICATION_ENV') ?: 'production';

// Use the $env value to determine which modules to load
$modules = array(
    'Album',
);

if ($env == 'development') {
	$modules[] = 'Album';
}

#echo "APPLICATION_ENV is ".$env;
return array(
    'modules' => $modules,
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
);