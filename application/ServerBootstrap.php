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
class ServerBootstrap extends Firal_Bootstrap
{

    /**
     * The RPC server object
     *
     * @var Firal_Service_Server_Interface
     */
    protected $_rpcServer = null;

    /**
     * Initiate RPC Server
     *
     * @return void
     */
    protected function _initRpcServer()
    {
        $request = new Zend_Controller_Request_Http();
        $path = explode('/',trim($request->getPathInfo(),'/'));
        $path = array_shift($path);
        switch($path){
            case 'xmlrpc':
                $this->_rpcServer = new Firal_Service_Server_XmlRpc();
                break;
            case 'jsonrpc':
                $this->_rpcServer = new Firal_Service_Server_JsonRpc();
                break;
            default:
                throw new Exception("Invalid API Endpoint");
                break;
        }
    }

    /**
     * Handle the RPC request
     *
     * @return void
     */
    public function run()
    {
        echo $this->_rpcServer->handle(); die();
    }
}
