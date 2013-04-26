<?php
namespace WebTales\MongoFilters\Uid;

use WebTales\MongoFilters\AbstractFilter;
use WebTales\MongoFilters\Exception;

class UidFilter extends AbstractFilter
{

    protected $_value;

    public function __construct (array $params = null)
    {
        if (! isset($params['value'])) {
            throw new Exception('value is required');
        }
        if (! is_string($params['value']) || $params['value'] instanceof \MongoId) {
            throw new Exception('Only Accepts string or MongoId');
        }
        $this->_value = $params['value'];
        
        return $this;
    }

    public function toArray ()
    {
        $id = $this->_value;
        if (! $id instanceof \MongoId) {
            $id = new \MongoId($id);
        }
        return array('_id' => $id);        
    }

    
}