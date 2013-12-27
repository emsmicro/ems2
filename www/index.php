<?php

// Uncomment this line if you must temporarily take down your site for maintenance.
// require '.maintenance.php';
//define('LIBS_DIR',  __DIR__ . '/../../lib');

// absolute filesystem path to the web root
define('WWW_DIR', dirname(__FILE__));

// absolute filesystem path to the application root
define('APP_DIR', WWW_DIR . '/../app');

// absolute filesystem path to the libraries
define('LIBS_DIR', WWW_DIR . '/../../lib');
define('UPL_DIR', WWW_DIR . '/../uploads');

// absolute filesystem path to the application, libs, log, upload dir
//$parameters['appDir'] = realpath(__DIR__ . '/../app');
$parameters['libsDir'] = realpath(__DIR__ . '/../../lib');
//$parameters['logDir'] = realpath(__DIR__ . '/../log');
$parameters['uplDir'] = realpath(__DIR__ . '/uploads');
//$parameters['tempDir'] = realpath(__DIR__ . '/../temp');

// Let bootstrap create Dependency Injection container.
// load bootstrap file
$container = require APP_DIR . '/bootstrap.php';


// Run application.
$container->application->run();
