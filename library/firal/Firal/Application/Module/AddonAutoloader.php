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
 * @subpackage Module
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */

/**
 * Addon resource
 *
 * @category   Firal
 * @package    Firal_Application
 * @subpackage Module
 * @copyright  Copyright (c) 2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */
class Firal_Application_Module_AddonAutoloader extends Firal_Application_Module_Autoloader
{
    
    /**
     * Constructor
     *
     * @param  array|Zend_Config $options
     * @return void
     */
    public function __construct($options, $module)
    {
        parent::__construct($options);
        $this->initDefaultResourceTypes($module);
    }

    /**
     * Initialize default resource types for module resource classes
     *
     * @return void
     */
    public function initDefaultResourceTypes($module = false)
    {
        if ($module === false) {
            return;
        }

        $this->addResourceTypes(array(
            'di'      => array(
                'namespace' => $module . '_Di',
                'path'      => 'di'
            ),
            'dbtable' => array(
                'namespace' => $module . '_Model_DbTable',
                'path'      => 'models/DbTable',
            ),
            'mappers' => array(
                'namespace' => $module . '_Model_Mapper',
                'path'      => 'models/mappers',
            ),
            'form'    => array(
                'namespace' => $module . '_Form',
                'path'      => 'forms',
            ),
            'model'   => array(
                'namespace' => $module . '_Model',
                'path'      => 'models',
            ),
            'plugin'  => array(
                'namespace' => $module . '_Plugin',
                'path'      => 'plugins',
            ),
            'service' => array(
                'namespace' => $module . '_Service',
                'path'      => 'services',
            ),
            'viewhelper' => array(
                'namespace' => $module . '_View_Helper',
                'path'      => 'views/helpers',
            ),
            'viewfilter' => array(
                'namespace' => $module . '_View_Filter',
                'path'      => 'views/filters',
            ),
        ));
        $this->setDefaultResourceType('model');
    }
}
