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
 * @subpackage Action_Helper
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */

/**
 * ViewRenderer action helper
 *
 * @category   Firal
 * @package    Firal_Controller
 * @subpackage Action_Helper
 * @copyright  Copyright (c) 2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */
class Firal_Controller_Action_Helper_ViewRenderer extends Zend_Controller_Action_Helper_ViewRenderer
{

    /**
     * Addons
     *
     * @var array
     */
    protected $_addons = array();


    /**
     * Render, and add the theme directory as base path
     *
     * @return void
     */
    public function render($action = null, $name = null, $noController = null)
    {
        foreach ($this->_addons as $addon) {
            if ($addon->hasModule($this->getModule())) {
                $this->view->addBasePath($addon->getModulePath($this->getModule()) . DIRECTORY_SEPARATOR . 'views');
            }
        }

        parent::render($action, $name, $noController);
    }

    /**
     * Add an addon
     *
     * @param Firal_Addon $addon
     *
     * @return Firal_Controller_Action_Helper_ViewRenderer
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
     * @return Firal_Controller_Action_Helper_ViewRenderer
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
}
