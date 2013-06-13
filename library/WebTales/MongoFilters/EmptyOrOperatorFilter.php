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
        if (! isset($this->name)) {
            throw new Exception('name is required');
        }
        if (! isset($this->value)) {
            throw new Exception('value is required');
        }
        if (! isset($this->operator)) {
            throw new Exception('operator is required');
        }
        $tempFilter = Filter::Factory('Or')->addFilter(Filter::Factory('OperatorToValue')->setName($this->name)
            ->setOperator($this->operator)
            ->setValue($this->value))
            ->addFilter(Filter::Factory('Value')->setName($this->name)
            ->setValue(''))
            ->addFilter(Filter::Factory('Null')->setName($this->name));
        
        return $tempFilter->toArray();
    }
}
