<?php
namespace WebTales\MongoFilters\Uid;

use WebTales\MongoFilters\Exception;

class OperatorToUidFilter extends UidFilter
{

    protected $_operator = null;

    public function setValue ($_value)
    {
        if (is_array($_value)) {
            foreach ($_value as $id) {
                if (! is_string($id) || $id instanceof \MongoId) {
                    throw new Exception('Only Accepts string or MongoId');
                }
            }
        } elseif (! is_string($_value) && ! $_value instanceof \MongoId) {
            throw new Exception('Only Accepts string or MongoId');
        }
        
        $this->_value = $_value;
    }

    public function __construct (array $params = null)
    {
        if (isset($params['operator'])) {
            $this->_operator = $params['operator'];
        }
        
        return parent::__construct($params);
    }
    
    /*
     * (non-PHPdoc) @see \WebTales\MongoFilters\AbstractFilter::toArray()
     */
    public function toArray ()
    {
        if (! isset($this->_value)) {
            throw new Exception('value is required');
        }
        if (! isset($this->_operator)) {
            throw new Exception('operator is required');
        }
        
        if (is_array($this->_value)) {
            $value = array();
            foreach ($this->_value as $id) {
                $id = $this->_value;
                if (! $id instanceof \MongoId) {
                    $id = new \MongoId($id);
                }
                $value[] = $id;
            }
        } else {
            $value = $this->_value;
            if (! $value instanceof \MongoId) {
                $value = new \MongoId($value);
            }
        }
        
        return array(
            '_id' => array(
                $this->_operator => $value
            )
        );
    }
}