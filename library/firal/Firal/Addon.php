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
 * @package    Firal_Addon
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */


/**
 * Abstract addon class
 *
 * @category   Firal
 * @package    Firal_Addon
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */
abstract class Firal_Addon
{

    /**
     * The addon's name
     *
     * @var string
     */
    protected $_name;

    /**
     * Modules that this addon provides
     *
     * @var array
     */
    protected $_modules;


    /**
     * Get the addon's name
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Check if this addon has a module
     *
     * @param string $module
     *
     * @return bool
     */
    public function hasModule($module)
    {
        return isset($this->_modules[$module]);
    }

    /**
     * Get all the addon's modules
     *
     * @return array
     */
    public function getModules()
    {
        return $this->_modules;
    }
}
