<?php
namespace WebTales\MongoFilters;

class RegexFilter extends OperatorToValueFilter
{

    protected $operator = '$regex';
    
    /*
     * (non-PHPdoc) @see \WebTales\MongoFilters\OperatorToValueFilter::toArray()
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
        
        $value = $this->value;
        if (! $value instanceof \MongoRegex) {
            $value = new \MongoRegex($value);
        }
        
        return array(
            $this->name => array(
                $this->operator => $value
            )
        );
    }
}
