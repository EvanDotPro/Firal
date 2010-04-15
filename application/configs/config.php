<?php
$config = array();

$config['bootstrap']['path']     = APPLICATION_PATH . '/Bootstrap.php';
$config['bootstrap']['class']    = 'Bootstrap';

$config['autoloaderNamespaces'][] = 'Firal_';

$config['resources']['frontController']['moduleDirectory']      = APPLICATION_PATH . '/modules';
$config['resources']['frontController']['prefixDefaultModule']  = true;

$config['resources']['modules'] = array();
$config['resources']['view'] = array();

$config['resources']['layout']['layout']        = 'layout';
$config['resources']['layout']['pluginClass']   = 'Firal_Controller_Plugin_Layout';
$config['resources']['layout']['layoutPath']    = APPLICATION_PATH . '/layouts/scripts';

$config['resources']['db']['adapter'] = 'pdo_mysql';

$config['resources']['cachemanager']['database']['frontend']['name'] = 'Core';
$config['resources']['cachemanager']['database']['frontend']['options']['automatic_serialization'] = true;
$config['resources']['cachemanager']['database']['backend'] = array();

$config['resources']['plugin']['path'] = APPLICATION_PATH . '/plugins';

include dirname(__FILE__) . '/' . APPLICATION_ENV . '.config.php';

return $config;
