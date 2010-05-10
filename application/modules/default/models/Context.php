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
 * @package    Default_Models
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */

/**
 * Context model
 *
 * @category   Firal
 * @package    Default_Models
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */
class Default_Model_Context extends Firal_Model_ModelAbstract
{

    /**
     * Id
     *
     * @var int
     */
    protected $_id;

    /**
     * Name
     *
     * @var string
     */
    protected $_name;

    /**
     * Host
     *
     * @var string
     */
    protected $_host;

    /**
     * Path
     *
     * @var string
     */
    protected $_path;

    /**
     * Constructor
     *
     * @param array $values
     *
     * @return void
     */
    public function __construct(array $values = array())
    {
        if (isset($values['context_id'])) {
            $this->_id = $values['context_id'];
        }
        if (isset($values['name'])) {
            $this->_name = $values['name'];
        }
        if (isset($values['host'])) {
            $this->_host = $values['host'];
        }
        if (isset($values['path'])) {
            $this->_path = $values['path'];
        }
    }

    /**
     * Get the id
     *
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Get the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set the name
     *
     * @param string $name
     *
     * @return Default_Model_Site
     */
    public function setName($name)
    {
        $this->_name = $name;

        return $this;
    }

    /**
     * Get the host
     *
     * @return string
     */
    public function getHost()
    {
        return $this->_host;
    }

    /**
     * Set the host
     *
     * @param string $host
     *
     * @return Default_Model_Site
     */
    public function setHost($host)
    {
        $this->_host = $host;

        return $this;
    }

    /**
     * Get the path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->_path;
    }

    /**
     * Set the path
     *
     * @param string $path
     *
     * @return Default_Model_Site
     */
    public function setPath($path)
    {
        $this->_path = $path;

        return $this;
    }
}
