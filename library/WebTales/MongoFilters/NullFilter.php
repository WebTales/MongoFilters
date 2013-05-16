<?php
namespace WebTales\MongoFilters;

use WebTales\MongoFilters\AbstractFilter;
use WebTales\MongoFilters\Exception;

class NullFilter extends ValueFilter
{

    
    public function __construct (array $params=null)
    {
        if(isset($params['name'])){
            $this->_name = $params['name'];
        }   
        return $this;
    }

    public function toArray ()
    {
        if(!isset($this->_name)){
            throw new Exception('name is required');
        }

        return array($this->_name => null);        
    }
    

    public function getName ()
    {
        return $this->_name;
    }


    public function setName ($_name)
    {
        $this->_name = $_name;
        return $this;
    }
    
}