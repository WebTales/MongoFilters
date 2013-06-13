<?php
namespace WebTales\MongoFilters;

class RegexFilter extends OperatorToValueFilter
{

    protected $_operator = '$regex';
    
    /*
     * (non-PHPdoc) @see \WebTales\MongoFilters\OperatorToValueFilter::toArray()
     */
    public function toArray ()
    {
        if (! isset($this->_name)) {
            throw new Exception('name is required');
        }
        if (! isset($this->_value)) {
            throw new Exception('value is required');
        }
        if (! isset($this->_operator)) {
            throw new Exception('operator is required');
        }
        
        $value = $this->_value;
        if (! $value instanceof \MongoRegex) {
            $value = new \MongoRegex($value);
        }
        
        return array(
            $this->_name => array(
                $this->_operator => $value
            )
        );
    }
}