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
 * @package    Default_Services
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */

/**
 * Context server service class
 *
 * @category   Firal
 * @package    Default_Services
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */
class Default_Service_ContextServer implements Default_Service_ContextInterface
{

    /**
     * Service to decorate toserver
     *
     * @var Default_Service_UserInterface
     */
    protected $_service;


    /**
     * Constructor
     *
     * @param Default_Service_ContextInterface $service
     *
     * @return void
     */
    public function __construct(Default_Service_ContextInterface $service)
    {
        $this->_service = $service;
    }

    /**
     * Finds a context via the host and path
     *
     * @param string $host
     * @param string $path
     *
     * @return array|bool
     */
    public function fetchByHostPath($host, $path)
    {
        return $this->_service->fetchByHostPath($data);
    }
}
