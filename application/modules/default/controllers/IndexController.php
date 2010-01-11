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
 * @package    Default_Controllers
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */

/**
 * Index Controller
 *
 * @category   Firal
 * @package    Default_Controllers
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */
class IndexController extends Zend_Controller_Action
{

    /**
     * Index page
     *
     * @return void
     */
    public function indexAction()
    {
        $userService = new Default_Service_User(new Default_Model_Mapper_User());

        $this->view->config = $this->getInvokeArg('bootstrap')->getResource('config');
    }
}