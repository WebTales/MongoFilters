<?php
namespace WebTales\MongoFilters\Simple;

use WebTales\MongoFilters\AbstractFilter;
use WebTales\MongoFilters\Exception;

class ValueFilter extends AbstractFilter
{
    protected $_name;
    
    protected $_value;
    
    public function __construct (array $params=null)
    {
        if(!isset($params['name'])){
            throw new Exception('name is required');
        }
        if(!isset($params['value'])){
            throw new Exception('value is required');
        }
        
        $this->_name = $params['name'];
        $this->_value = $params['value'];
        
        return $this;
    }

    public function toArray ()
    {
        return array($this->_name => $this->_value);        
    }

    
}