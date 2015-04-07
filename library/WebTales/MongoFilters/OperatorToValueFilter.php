<?php
namespace WebTales\MongoFilters;

use WebTales\MongoFilters\Exception;

class OperatorToValueFilter extends ValueFilter
{

    protected $operator = null;

    public function __construct(array $params = null)
    {
        if (isset($params['operator'])) {
            $this->operator = $params['operator'];
        }
        
        return parent::__construct($params);
    }
    
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
        if (in_array($this->operator,array('$in',"nin"))){
            $this->value=array_values($this->value);
        }
        return array(
            $this->name => array(
                $this->operator => $this->value
            )
        );
    }

    public function getOperator()
    {
        return $this->operator;
    }

    public function setOperator($operator)
    {
        $this->operator = $operator;
        return $this;
    }
}
