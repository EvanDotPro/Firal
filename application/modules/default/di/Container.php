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
 * @package    Firal_Di
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */


/**
 * An event
 *
 * @category   Firal
 * @package    Firal_Di
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */
class Default_Di_Container extends Firal_Di_Container_ContainerAbstract
{

    /**
     * getContextServiceStandalone
     *
     * @return Default_Service_ContextServer
     */
    public function getContextServiceStandalone()
    {
        if (!isset($this->_storage['contextService'])) {
            /**
             * This is exaggerated to show how the response goes from being an object
             * to a simple data type for RPC, then back to an object on the client side.
             * We'll skip this step in standalone mode, most likely since it's only needed
             * for RPC, but I'm not positive of that.
             */
            $mapper = new Default_Model_Mapper_Context();
            $service = new Default_Service_Context($mapper);
            $serviceServer = new Default_Service_ContextServer($service);
            $serviceClient = new Default_Service_ContextClient($serviceServer);
            $this->_storage['contextService'] = $serviceClient;
        }
        return $this->_storage['contextService'];
    }
}
