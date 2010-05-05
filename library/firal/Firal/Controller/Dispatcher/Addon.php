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
 * @package    Firal_Controller
 * @subpackage Dispatcher
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */

/**
 * Dispatcher with capabilities of dispatching to add-ons
 *
 * @category   Firal
 * @package    Firal_Controller
 * @subpackage Dispatcher
 * @copyright  Copyright (c) 2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */
class Firal_Controller_Dispatcher_Addon extends Zend_Controller_Dispatcher_Standard
{

    /**
     * Addons
     *
     * @var array
     */
    protected $_addons = array();


    /**
     * Add an addon
     *
     * @param Firal_Addon $addon
     *
     * @return Firal_Controller_Dispatcher_Addon
     */
    public function addAddon(Firal_Addon $addon)
    {
        $this->_addons[$addon->getName()] = $addon;

        return $this;
    }

    /**
     * Set the addons array
     *
     * @param array $addons
     *
     * @return Firal_Controller_Dispatcher_Addon
     */
    public function setAddons(array $addons)
    {
        $this->_addons = array();

        foreach ($addons as $addon) {
            $this->addAddon($addon);
        }

        return $this;
    }

    /**
     * Get an addon
     *
     * @param string $name
     *
     * @return Firal_Addon
     */
    public function getAddon($name)
    {
        return $this->_addons[$name];
    }

    /**
     * Get all addons
     *
     * @return array
     */
    public function getAddons()
    {
        return $this->_addons;
    }

    /**
     * Temporary hack
     *
     * @todo replace this hack with better code
     *
     * @return bool
     */
    public function isDispatchable(Zend_Controller_Request_Abstract $request)
    {
        return true;
    }

    /**
     * Load a controller class
     *
     * Attempts to load the controller class file from the available addon's
     * If that fails, it attempts to load it from the
     * {@link getControllerDirectory()}.  If the controller belongs to a
     * module, looks for the module prefix to the controller class.
     *
     * @param string $className
     * @return string Class name loaded
     * @throws Zend_Controller_Dispatcher_Exception if class not loaded
     */
    public function loadClass($className)
    {
        $finalClass  = $className;
        if (($this->_defaultModule != $this->_curModule)
            || $this->getParam('prefixDefaultModule'))
        {
            $finalClass = $this->formatClassName($this->_curModule, $className);
        }
        if (class_exists($finalClass, false)) {
            return $finalClass;
        }

        $class = $finalClass;

        // load from addon if possible
        foreach ($this->_addons as $addon) {
            if ($addon->hasModule($this->_curModule)) {
                $dispatchDir = $addon->getModulePath($this->_curModule) . DIRECTORY_SEPARATOR . 'controllers';
                $loadFile = $dispatchDir . DIRECTORY_SEPARATOR . $this->classToFilename($className);

                if (Zend_Loader::isReadable($loadFile)) {
                    include_once $loadFile;
                } else {
                    continue;
                }

                $finalClass = ucfirst($addon->getName()) . '_' . $class;

                if (class_exists($finalClass, false)) {
                    return $finalClass;
                }
            }
        }

        exit($finalClass);

        return parent::loadClass($className);
    }
}
