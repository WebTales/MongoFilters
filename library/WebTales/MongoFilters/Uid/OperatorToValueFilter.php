<?php
namespace WebTales\MongoFilters\Uid;

use WebTales\MongoFilters\Exception;

class OperatorToValueFilter extends UidFilter
{

    protected $_operator = null;

    public function __construct (array $params = null)
    {
        if (is_null($this->_operator)) {
            if (! isset($params['operator'])) {
                throw new Exception('operator is required');
            }
            $this->_operator = $params['operator'];
        }
        
        if (! isset($params['value'])) {
            throw new Exception('value is required');
        }
        if (is_array($params['value'])) {
            foreach ($params['value'] as $id) {
                if (! is_string($id) || $id instanceof \MongoId) {
                    throw new Exception('Only Accepts string or MongoId');
                }
            }
        } elseif (! is_string($params['value']) || $params['value'] instanceof \MongoId) {
            throw new Exception('Only Accepts string or MongoId');
        }
        $this->_value = $params['value'];
        
        return $this;
    }
    
    /*
     * (non-PHPdoc) @see \WebTales\MongoFilters\AbstractFilter::toArray()
     */
    public function toArray ()
    {
        if (is_array($this->_value)) {
            $value = array();
            foreach ($this->_value as $id) {
                $id = $this->_value;
                if (! $id instanceof \MongoId) {
                    $id = new \MongoId($id);
                }
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