<?php
namespace WebTales\MongoFilters;

use WebTales\MongoFilters\Exception;

class OperatorToValueFilter extends ValueFilter
{

    protected $_operator = null;

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
        if(!isset($this->_name)){
            throw new Exception('name is required');
        }
        if(!isset($this->_value)){
            throw new Exception('value is required');
        }
        if(!isset($this->_operator)){
            throw new Exception('operator is required');
        }
        
        return array(
            $this->_name => array(
                $this->_operator => $this->_value
            )
        );
    }
    

    public function getOperator ()
    {
        return $this->_operator;
    }


    public function setOperator ($_operator)
    {
        $this->_operator = $_operator;
        return $this;
    }

    
    
}