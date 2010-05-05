<?php
/**
 * Firal
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://firal.org/licenses/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to firal-dev@googlegroups.com so we can send you a copy immediately.
 *
 * @category   Firal
 * @package    Firal_Bootstrap
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd	New BSD License
 */

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', realpath(dirname(__FILE__) . '/../'));
}

// Define path to application directory
if (!defined('APPLICATION_PATH')) {
    define('APPLICATION_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'application');
}

if (!defined('LIBRARY_PATH')) {
    define('LIBRARY_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'library');
}

if (!defined('MODULE_PATH')) {
    define('MODULE_PATH', APPLICATION_PATH . DIRECTORY_SEPARATOR . 'modules');
}

// Define application environment
if (!defined('APPLICATION_ENV')) {
    define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));
}

// Define application mode
if (!defined('APPLICATION_MODE')) {
    define('APPLICATION_MODE', (getenv('APPLICATION_MODE') ? getenv('APPLICATION_MODE') : 'standalone'));
}

// create our own include path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(LIBRARY_PATH . DIRECTORY_SEPARATOR . 'zend'),
    realpath(LIBRARY_PATH . DIRECTORY_SEPARATOR . 'firal'),
    '.'
    // get_include_path(), // only add this when there are things not working
)));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'config.php'
);

$application->bootstrap()
            ->run();
