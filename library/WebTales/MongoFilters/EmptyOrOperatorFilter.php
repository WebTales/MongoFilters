<?php
namespace WebTales\MongoFilters;

use WebTales\MongoFilters\Exception;

class EmptyOrOperatorFilter extends OperatorToValueFilter
{
    
    /*
     * (non-PHPdoc) @see \WebTales\MongoFilters\AbstractFilter::toArray()
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
        $tempFilter = Filter::Factory('Or')
                        ->addFilter(Filter::Factory('OperatorToValue')->setName($this->_name)->setOperator($this->_operator)->setValue($this->_value))
                        ->addFilter(Filter::Factory('Value')->setName($this->_name)->setValue(''))
                        ->addFilter(Filter::Factory('Null')->setName($this->_name));
        
        return $tempFilter->toArray();
    }
}