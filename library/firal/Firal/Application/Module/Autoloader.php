
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
class Firal_Application_Module_Autoloader extends Zend_Application_Module_Autoloader
{
    /**
     * Initialize default resource types for module resource classes
     *
     * @return void
     */
    public function initDefaultResourceTypes()
    {
        $this->addResourceTypes(array(
            'di'      => array(
                'namespace' => 'Di',
                'path'      => 'di'
            ),
            'dbtable' => array(
                'namespace' => 'Model_DbTable',
                'path'      => 'models/DbTable',
            ),
            'mappers' => array(
                'namespace' => 'Model_Mapper',
                'path'      => 'models/mappers',
            ),
            'form'    => array(
                'namespace' => 'Form',
                'path'      => 'forms',
            ),
            'model'   => array(
                'namespace' => 'Model',
                'path'      => 'models',
            ),
            'plugin'  => array(
                'namespace' => 'Plugin',
                'path'      => 'plugins',
            ),
            'service' => array(
                'namespace' => 'Service',
                'path'      => 'services',
            ),
            'viewhelper' => array(
                'namespace' => 'View_Helper',
                'path'      => 'views/helpers',
            ),
            'viewfilter' => array(
                'namespace' => 'View_Filter',
                'path'      => 'views/filters',
            ),
        ));
        $this->setDefaultResourceType('model');
    }
}
