<?php
namespace WebTales\MongoFilters\Simple;

use WebTales\MongoFilters\Exception;

class OperatorToValueFilter extends ValueFilter
{

    protected $_operator = null;
    

    public function __construct (array $params=null)
    {
        if (is_null($this->_operator)) {
            if (! isset($params['operator'])) {
                throw new Exception('operator is required');
            }
            $this->_operator = $params['operator'];
        }
        
        return parent::__construct($params);
        ;
    }
    
    /*
     * (non-PHPdoc) @see \WebTales\MongoFilters\AbstractFilter::toArray()
     */
    public function toArray ()
    {
        return array(
            $this->_name => array(
                $this->_operator => $this->_value
            )
        );
    }
}