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
 * @subpackage Plugin
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */

/**
 * Layout controller plugin
 *
 * @category   Firal
 * @package    Firal_Controller
 * @subpackage Plugin
 * @copyright  Copyright (c) 2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */
class Firal_Controller_Plugin_Layout extends Zend_Layout_Controller_Plugin_Layout
{

    /**
     * Addons
     *
     * @var array
     */
    protected $_addons = array();


    /**
     * postDispatch() plugin hook -- render layout
     *
     * @return void
     */
    public function postDispatch(Zend_Controller_Request_Abstract $request)
    {
        $layout = $this->getLayout();
        $view   = $layout->getView();

        foreach ($this->_addons as $addon) {
            if (null !== ($path = $layout->getViewScriptPath())) {
                if (method_exists($view, 'addScriptPath')) {
                    $view->addScriptPath($path);
                } else {
                    $view->setScriptPath($path);
                }
            } else {
                // TODO: throw an exception for this case
            }

            $layout->setLayoutPath($addon->getPath() . DIRECTORY_SEPARATOR . 'layouts');
        }

        parent::postDispatch($request);
    }

    /**
     * Add an addon
     *
     * @param Firal_Addon $addon
     *
     * @return Firal_Controller_Plugin_Layout
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
     * @return Firal_Controller_Plugin_Layout
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
