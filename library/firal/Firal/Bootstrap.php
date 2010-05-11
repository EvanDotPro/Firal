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
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */

/**
 * Bootstrap
 *
 * @category   Firal
 * @package    Firal_Bootstrap
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */
class Firal_Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * Initialize the plugin loader
     *
     * @return void
     */
    protected function _initPluginLoader()
    {
        $this->getPluginLoader()->addPrefixPath(
            'Firal_Application_Resource',
            'Firal/Application/Resource/'
        );
    }

    /**
     * Initialize the modules and addons stuff
     *
     * @return void
     */
    protected function _initModulesAddons()
    {
        $moduleLoader = new Firal_Application_Module_Autoloader(array(
            'namespace' => 'Default_',
            'basePath'  => MODULE_PATH . DIRECTORY_SEPARATOR . 'default'
        ));

        // Coming... soon?
        //$diContainer = new Default_Di_Container();
        //$service = $diContainer->getContextService();
        //var_dump($service->fetchByHostPath('host','path'));

        // this is to make sure that the addon resource is loaded before the
        // frontcontroller resource
        $this->bootstrap('addon');
    }
}
