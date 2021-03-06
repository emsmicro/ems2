<?php

// Load Nette Framework or autoloader generated by Composer
require __DIR__ . '/../../lib/autoload.php';


$configurator = new Nette\Config\Configurator;

// Enable Nette Debugger for error visualisation & logging
//$configurator->setDebugMode(TRUE);
$configurator->enableDebugger(__DIR__ . '/../log');

// Specify folder for cache
$configurator->setTempDirectory(__DIR__ . '/../temp');

// Enable RobotLoader - this will load all classes automatically
$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->addDirectory(__DIR__ . '/../../lib')
	->register();

// Create Dependency Injection container from config.neon file
$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->addConfig(__DIR__ . '/config/config.local.neon'); // none section , $configurator::NONE
$container = $configurator->createContainer();

//dd($container,'Nette Kontejner');

// create DB connection
dibi::connect($container->parameters['database']);

//dibi::getProfiler()->setFile($parameters['logDir'] .'\log.sql');

//DateInput register
Vodacek\Forms\Controls\DateInput::register();

//Extras\Debug\ComponentTreePanel::register();

Kdyby\Extension\Diagnostics\HtmlValidator\DI\ValidatorExtension::register($configurator);


return $container;


/**
 * Dumpování proměnných do DebugBaru
 * @param type $var
 * @param string $title
 * @return type 
 */
function dd($var, $title='')
{
        $backtrace = debug_backtrace();
        $source = (isset($backtrace[1]['class'])) ?
                $backtrace[1]['class'] :
                basename($backtrace[0]['file']);
        $line = $backtrace[0]['line'];
        if($title !== '')
                $title .= ' – ';
        return Nette\Diagnostics\Debugger::barDump($var, $title . $source . ' (' . $line .')');
}