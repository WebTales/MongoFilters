<?php
namespace WebTales\MongoFilters;

use WebTales\MongoFilters\AbstractFilter;
use WebTales\MongoFilters\Exception;

class UidFilter extends AbstractFilter
{

    protected $_value;

    public function getValue ()
    {
        return $this->_value;
    }

    public function setValue ($_value)
    {
        if (! is_string($_value) && ! $_value instanceof \MongoId) {
            throw new Exception('Only Accepts string or MongoId');
        }
        $this->_value = $_value;
        
        return $this;
    }

    public function __construct (array $params = null)
    {
        if (isset($params['value'])) {
            $this->setValue($params['value']);
        }
        
        return $this;
    }

    public function toArray ()
    {
        $id = $this->_value;
        if (! $id instanceof \MongoId) {
            $id = new \MongoId($id);
        }
        return array(
            '_id' => $id
        );
    }
}