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
    public function init($options = array())
    {
        $addons = array();

        // get all the add-ons and create their addon classes
        $directories = new DirectoryIterator($options['directory']);

        foreach ($directories as $directory) {
            if ($directory->isDir() && !$directory->isDot()) {
                $addon = $this->_loadAddon($directory);

                $addons[$addon->getName()] = $addon;
            }
        }

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
        $name  = $this->_formatAddonName($directory->getFilename());
        $file  = $directory->getPathname() . DIRECTORY_SEPARATOR . 'Addon.php';
        $class = $name . '_Addon';

        if (Zend_Loader::isReadable($file)) {
            require_once $file;

            if (class_exists($class, false)) {
                $addon = new $class();

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
            $front->addControllerDirectory($addon->getModulePath($module) . DIRECTORY_SEPARATOR . 'controllers', $module);
        }
    }

    /**
     * Format the addon name
     *
     * @param string $name
     *
     * @return string
     */
    protected function _formatAddonName($name)
    {
        $name = str_replace(array('-', '_'), ' ', $name);
        $name = ucwords(strtolower($name));
        return str_replace(' ', '', $name);
    }
}
