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
 * @package    Module_Default
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */


/**
 * Di Container interface for the default module
 *
 * @category   Firal
 * @package    Module_Default
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */
interface Default_Default_DiContainerInterface
{

    /**
     * Get the user service
     *
     * @return Default_Service_User
     */
    public function getUserService();

    /**
     * Get the user mapper
     *
     * @return Default_Model_Mapper_UserInterface
     */
    public function getUserMapper();

    /**
     * Get the config service
     *
     * @return Default_Service_Config
     */
    public function getConfigService();

    /**
     * Get the config mapper
     *
     * @return Default_Model_Mapper_ConfigInterface
     */
    public function getConfigMapper();
}
