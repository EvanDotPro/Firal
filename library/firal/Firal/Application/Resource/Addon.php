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
 * @package    Firal_Application
 * @subpackage Resource
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */

/**
 * Addon resource
 *
 * @category   Firal
 * @package    Firal_Application
 * @subpackage Resource
 * @copyright  Copyright (c) 2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */
class Firal_Application_Resource_Addon extends Zend_Application_Resource_ResourceAbstract
{


    /**
     * Initialize this resource
     *
     * @return array
     */
    public function init()
    {
        // we need the cachemanager resource bootstrapped later on
        $this->getBootstrap()->bootstrap('cachemanager');

        $options = $this->getOptions();

        Firal_Addon::setBasePath($options['directory']);

        // initialize the addon dispatcher
        $dispatcher = new Firal_Controller_Dispatcher_Addon();
        $front      = Zend_Controller_Front::getInstance();

        $front->setDispatcher($dispatcher);

        $addons = array();

        // get all the add-ons and create their addon classes
        $directories = new DirectoryIterator($options['directory']);

        foreach ($directories as $directory) {
            if ($directory->isDir() && !$directory->isDot()) {
                $addon = $this->_loadAddon($directory);

                $addons[$addon->getName()] = $addon;
            }
        }

        $dispatcher->setAddons($addons);

        return $addons;
    }

    /**
     * Load an addon
     *
     * @param DirectoryIterator $directory
     *
     * @return void
     */
    protected function _loadAddon(DirectoryIterator $directory)
    {
        $name  = $this->_formatName($directory->getFilename());
        $file  = $directory->getPathname() . DIRECTORY_SEPARATOR . 'Addon.php';
        $class = $name . '_Addon';

        if (Zend_Loader::isReadable($file)) {
            require_once $file;

            if (class_exists($class, false)) {
                $addon = new $class();

                $this->_loadModules($addon);

                if ($addon instanceof Firal_Addon) {
                    return $addon;
                }
            }
        }
    }

    /**
     * Load the modules of an addon
     *
     * @param Firal_Addon $addon
     *
     * @return void
     */
    public function _loadModules(Firal_Addon $addon)
    {
        $front = Zend_Controller_Front::getInstance();

        foreach ($addon->getModules() as $module) {
            $path = $addon->getModulePath($module);

            // ask the frontcontroller what the name of the controller directory is
            $controllerDirectoryName = $front->getModuleControllerDirectoryName();

            // add the module to the frontcontroller
            $front->addControllerDirectory($path . DIRECTORY_SEPARATOR . $controllerDirectoryName, $module);

            $addonName = $this->_formatName($addon->getname());
            $module    = $this->_formatName($module);

            // evan: you did the right thing, but you simply didn't know how to configure it
            $autoloader = new Firal_Application_Module_AddonAutoloader(array(
                'namespace' => $addonName,
                'basePath'  => $path
            ), $module);

            // load the DI container for this module and put it in the registry
            $name   = $module . '_Di_Container';
            $class  = $addonName . '_' . $name;

            // TODO: we need to find a clean way how to do this
            $config = array(
                'mapper' => array(
                    'cache' => $this->getBootstrap()->getResource('cachemanager')->getCache('database')
                )
            );

            if (Zend_Registry::isRegistered($name)) {
                $diContainer = new $class($config, Zend_Registry::get($name));
            } else {
                $diContainer = new $class($config);
            }

            Zend_Registry::set($name, $diContainer);
        }
    }

    /**
     * Format the addon name
     *
     * @param string $name
     *
     * @return string
     */
    protected function _formatName($name)
    {
        $name = str_replace(array('-', '_'), ' ', $name);
        $name = ucwords(strtolower($name));
        return str_replace(' ', '', $name);
    }
}
