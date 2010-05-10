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
 * @subpackage Mapper
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */

/**
 * Context model mapper class
 *
 * @category   Firal
 * @package    Default_Models
 * @subpackage Mapper
 * @copyright  Copyright (c) 2009-2010 Firal (http://firal.org/)
 * @license    http://firal.org/licenses/new-bsd    New BSD License
 */
class Default_Model_Mapper_Context extends Firal_Model_Mapper_DbAbstract implements Default_Model_Mapper_ContextInterface
{

    /**
     * Table name
     *
     * @var string
     */
    protected $_name = 'context';

    /**
     * Fetch details about a context based on the host and path
     *
     * @param string $host
     * @param string $path
     *
     * @return array
     */
    public function fetchByHostPath($host, $path = null)
    {
        $db = $this->getAdapter();

        $sql = $db->select()
                  ->from($this->getTableName())
                  ->where('host = ?', $host);

        if ($path !== null) {
            $sql->where('path = ?', $path);
        }

        $row = $db->fetchRow($sql);

        if (false === $row) {
            return null;
        }

        return new Default_Model_Context($row);
    }
}
