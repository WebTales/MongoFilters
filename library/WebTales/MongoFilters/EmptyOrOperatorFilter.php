<?php
namespace WebTales\MongoFilters;

use WebTales\MongoFilters\Exception;

class EmptyOrOperatorFilter extends OperatorToValueFilter
{
    
    /*
     * (non-PHPdoc) @see \WebTales\MongoFilters\AbstractFilter::toArray()
     */
    public function toArray()
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
        $tempFilter = Filter::factory('Or')
                        ->addFilter(
                            Filter::factory('OperatorToValue')->setName($this->name)
                                ->setOperator($this->operator)
                                ->setValue($this->value)
                        )
                        ->addFilter(
                            Filter::factory('Value')
                                ->setName($this->name)
                                ->setValue('')
                        )
                        ->addFilter(
                            Filter::factory('Null')->setName($this->name)
                        );
        
        return $tempFilter->toArray();
    }
}
